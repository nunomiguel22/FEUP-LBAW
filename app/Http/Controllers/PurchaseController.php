<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Purchase;
use App\Models\Game;

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

        //dd($cart_items);

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
        return redirect("/shopping/cart");
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
        return redirect("/shopping/cart");
    }

    public function removeAllFromCart()
    {
        Auth::user()->cart_items()->detach();
        return redirect("/shopping/cart");
    }
}
