<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

use App\Models\Purchase;
use App\Models\Game;
use App\Models\GameKey;

class PurchaseController extends Controller
{
    public function getKeys(Request $request)
    {
        $this->authorize('view', Purchase::class);
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

    public function showProductCart()
    {
        $this->authorize('view', Purchase::class);
        
        $cart_items = Auth::user()->cart_items;

        $prices = array();

        foreach ($cart_items as $item) {
            array_push($prices, $item->price);
        }

        $total_price = array_sum($prices);

        return view('pages.product_cart', ['cart_items' => $cart_items, 'total_price' => $total_price]);
    }

    public function addProductToCart($id)
    {
        $this->authorize('view', Purchase::class);

        try {
            Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        Auth::user()->cart_items()->attach($id);
        return redirect("/products/".$id);
    }

    public function removeProductFromCart($id)
    {
        $this->authorize('view', Purchase::class);

        try {
            Auth::user()->cart_items()->findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        Auth::user()->cart_items()->detach($id);
        return back();
    }

    public function removeAllFromCart()
    {
        Auth::user()->cart_items()->detach();
        return back();
    }

    public function showCheckout()
    {
        $this->authorize('view', Purchase::class);
        $cart_items = null;
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

    public function completeCheckout(Request $request)
    {
        $this->authorize('view', Purchase::class);
        $payment_uuid = Str::uuid();

        $cart_items = null;
        $cart_items = Auth::user()->cart_items;

        if (!$cart_items->first()) {
            abort(404);
        }

        DB::beginTransaction();
        $prices = array();
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

    public function showCheckoutFailed($message)
    {
        $this->authorize('view', Purchase::class);

        return view('pages.checkout.checkout_failed', ['message' => $message]);
    }

    public function showCheckoutBankTransfer($total, $uuid)
    {
        $this->authorize('view', Purchase::class);

        return view('pages.checkout.bank_transfer', ['amount' => $total, 'uuid' => $uuid]);
    }

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
