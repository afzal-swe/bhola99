<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    private $db_users;
    private $db_categorie;
    private $db_products;
    private $db_cart;
    private $db_order;


    public function __construct()
    {
        $this->db_users = "users";
        $this->db_categorie = "categories";
        $this->db_products = "products";
        $this->db_cart = "cart";
        $this->db_order = "orders";
    }

    public function backend_home_page()
    {

        // Auth::check()
        $usertype = Auth::user()->usertype;

        if ($usertype == "1") {

            $total_user = DB::table($this->db_users)->where('usertype', 0)->get();
            $total_category = DB::table($this->db_categorie)->get();
            $total_product = DB::table($this->db_products)->get();
            $total_cart = DB::table($this->db_cart)->get();
            $total_delivered = DB::table($this->db_order)->where('delivery_status', '1')->get();
            $total_processing = DB::table($this->db_order)->where('delivery_status', '0')->get();
            $order = DB::table($this->db_order)->get();


            $total_reveneue = 0;
            foreach ($order as $order) {
                $total_reveneue = $total_reveneue + $order->product_price;
            }

            return view('backend.layouts.main', compact('total_user', 'total_category', 'total_product', 'total_cart', 'total_delivered', 'total_processing', 'total_reveneue'));
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


    // Admin Logout function 
    public function Admin_Logout()
    {
        Auth::logout();
        $notification = array('messege' => 'Logout Successfully', 'alert-type' => 'success');
        return redirect()->route('frontend_home_page')->with($notification);
    }
}
