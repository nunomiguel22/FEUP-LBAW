<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showDefault()
    {
        return $this->showSales();
    }

    public function showSales()
    {
        return view('pages.admin', ['tab_id' => 0]);
    }

    public function showNewGame()
    {
        return view('pages.admin', ['tab_id' => 2]);
    }
}
