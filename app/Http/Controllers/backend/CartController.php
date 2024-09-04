<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    private $db_cart;





    /**
     * Create a new instance of the controller.
     *
     * This constructor initializes the 'db_cart' property with the name of the 'cart' table.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_cart = "cart";
    }









    /**
     * Display the contents of the cart.
     *
     * This method retrieves all items from the 'cart' table, ordered by ID in descending order, and returns
     * the view for displaying the cart's contents.
     *
     * @return \Illuminate\View\View
     */
    public function View_Cart()
    {

        $cart = DB::table($this->db_cart)->orderBy('id', 'DESC')->get();
        return view('backend.cart.cart_view', compact('cart'));
    }
}
