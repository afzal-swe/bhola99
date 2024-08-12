<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    private $db_cart;

    public function __construct()
    {
        $this->db_cart = "cart";
    }

    // 
    public function View_Cart()
    {

        $cart = DB::table($this->db_cart)->orderBy('id', 'DESC')->get();
        return view('backend.cart.cart_view', compact('cart'));
    }
}
