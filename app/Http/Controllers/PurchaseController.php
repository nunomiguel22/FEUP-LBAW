<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\PurchaseEmail;
use App\Mail\KeyEmail;
use App\Models\Purchase;
use App\Models\Game;
use App\Models\GameKey;

class PurchaseController extends Controller
{
    // GET /admin/sale/{id}
    public function showSale($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        $purchase = null;
        try {
            $purchase = Purchase::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        return view('pages.admin.sale', ['purchase' => $purchase]);
    }

    // POST /admin/sale/{id}
    public function manageSale(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        $purchase = null;
        try {
            $purchase = Purchase::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        if ($purchase->status == "Completed") {
            return back()->withErrors(['error' => 'Cannot change the status of a purchase after it has been marked completed']);
        }
 
        if ($request->confirm) {
            $purchase->status = "Completed";
            Mail::to($purchase->user)->send(new KeyEmail($purchase->game()->title, $purchase->game_key->key));
        } else {
            $purchase->status = "Aborted";
        }

        $purchase->save();

        return back();
    }

    // GET /api/user/keys
    public function getKeys(Request $request)
    {
        $this->authorize('list', Purchase::class);

        $purchases = Auth::user()->purchases();

        if ($request->key_filter) {
            $purchases->where('status', $request->key_filter);
        }
        
        $purchases->with('game_key.game');

        $key_search = $request->key_search;

        if ($key_search) {
            $purchases->whereHas('game_key.game', function (Builder $query) use ($key_search) {
                $query->whereIn('id', Game::FTS($key_search));
            });
        }

        $purchases = $purchases->orderBy('timestamp', 'desc')->paginate(10);

        foreach ($purchases->getCollection() as $purchase) {
            if ($purchase->status != 'Completed') {
                $purchase->getRelation('game_key')->key = null;
            }
        }

        return $purchases;
    }

    // GET /user/cart
    public function showProductCart()
    {
        $this->authorize('list', Purchase::class);
        
        $cart_items = Auth::user()->cart_items;
        $prices = array();

        foreach ($cart_items as $item) {
            array_push($prices, $item->price);
        }

        $total_price = array_sum($prices);

        return view('pages.product_cart', ['cart_items' => $cart_items, 'total_price' => $total_price]);
    }

    // POST /products/{id}/cart
    public function addProductToCart($id)
    {
        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $this->authorize('addToCart', $game);

        Auth::user()->cart_items()->attach($id);
        return back();
    }

    // DELETE /products/{id}/cart
    public function removeProductFromCart($id)
    {
        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $this->authorize('removeFromCart', $game);

        Auth::user()->cart_items()->detach($id);
        return back();
    }

    // DELETE /user/cart
    public function removeAllFromCart()
    {
        $this->authorize('list', Purchase::class);
        Auth::user()->cart_items()->detach();
        return back();
    }

    // GET /user/cart/checkout
    public function showCheckout()
    {
        $this->authorize('list', Purchase::class);

        $cart_items = Auth::user()->cart_items;

        if (!$cart_items->first()) {
            abort(404);
        }

        $prices = array();

        foreach ($cart_items as $item) {
            array_push($prices, $item->price);
        }

        $total_price = array_sum($prices);

        return view('pages.checkout.checkout', ['cart_items' => $cart_items, 'total_price' => $total_price]);
    }

    // POST /user/cart/checkout
    public function completeCheckout(Request $request)
    {
        $this->authorize('list', Purchase::class);

        $payment_uuid = Str::uuid();
        $cart_items = Auth::user()->cart_items;
        $prices = array();

        if (!$cart_items->first()) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            foreach ($cart_items as $item) {
                $this->makePurchase($item, $payment_uuid, $request->method);
                array_push($prices, $item->price);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->showCheckoutFailed($e->getMessage());
        }

        //Redirects on success
        $total_price = array_sum($prices);
        if ($request->method == "BankTransfer") {
            return $this->showCheckoutBankTransfer($total_price, $payment_uuid);
        }
    }

    // Auxiliary checkout view in case of failure
    public function showCheckoutFailed($message)
    {
        return view('pages.checkout.checkout_failed', ['message' => $message]);
    }

    // Auxiliary checkout view in case of success
    public function showCheckoutBankTransfer($total, $uuid)
    {
        $this->authorize('list', Purchase::class);

        Mail::to(Auth::user())->send(new PurchaseEmail($total, $uuid));

        return view('pages.checkout.bank_transfer', ['amount' => $total, 'uuid' => $uuid]);
    }

    // Auxiliary checkout function that purchases each individual item in the checkout
    private function makePurchase($cart_item, $uuid, $method)
    {
        $key = GameKey::getAvailableKey($cart_item->id);
        if (!$key) {
            throw new \Exception("No key is currently available for game '".$cart_item->title."'. Try again later");
        }

        $purchase = new Purchase();
        $purchase->price = $cart_item->price;
        $purchase->method = $method;
        $purchase->payment_uuid = $uuid;
        $purchase->game_key_id = $key->id;
        $purchase->user_id = Auth::user()->id;
        $purchase->save();
    }
}
