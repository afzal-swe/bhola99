<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    private $db_users;
    private $db_products;


    public function __construct()
    {
        $this->db_users = "users";
        $this->db_products = "products";
    }

    public function backend_home_page()
    {

        // Auth::check()
        $usertype = Auth::user()->usertype;

        if ($usertype == "1") {
            return view('backend.layouts.main');
        } else {
            return view('frontend.main');
        }
    }

    // Frontend Home Page
    public function frontend_home_page()
    {
        return view('frontend.main');
    }




    /// Product Details
    public function Product_Details($slug)
    {
        $details = DB::table($this->db_products)
            ->where('slug', $slug)
            // ->join('categories', 'products.catagory', 'categories.id')
            // ->select('products.*', 'categories.name')
            ->first();
        return view('frontend.product.product_details', compact('details'));
    }
}
