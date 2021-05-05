<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function showKeys()
    {
        $this->authorize('view', Purchase::class);
        
        $purchases = Auth::user()->purchases;

        return view('pages.user.user', ['tab_id' => 2, 'purchases' => $purchases]);
    }


    public function getKeys()
    {
        $this->authorize('view', Purchase::class);
        $purchases = Auth::user()->purchases()
        ->with('game_key.game')->paginate(10);


        foreach ($purchases->getCollection() as $purchase) {
            if ($purchase->status != 'Completed') {
                $purchase->getRelation('game_key')->key = null;
            }
        }

        return $purchases;
    }
}
