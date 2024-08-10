<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CartController extends Controller
{
    //
    private $db_products;
    private $db_cart;

    public function __construct()
    {
        $this->db_products = "products";
        $this->db_cart = "cart";
    }

    public function Add_To_Cart(Request $request, $slug)
    {


        if (Auth::id()) {
            $user = Auth::user();
            $product = DB::table($this->db_products)->where('slug', $slug)->first();
            // dd($product);

            $data = array();
            $data['user_name'] = $user->name;
            $data['user_email'] = $user->email;
            $data['user_phone'] = $user->phone;
            $data['user_address'] = $user->address;
            $data['user_id'] = $user->id;

            $data['product_title'] = $product->title;
            $data['quantity'] = $product->quantity;
            $data['product_id'] = $product->id;
            $data['image'] = $product->image;
            $data['created_at'] = Carbon::now();

            if ($product->discount_price != null)
                $data['price'] = $product->discount_price;
            else {
                $data['price'] = $product->price;
            }

            DB::table($this->db_cart)->insert($data);

            $notification = array('message' => 'Add to Cart Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return redirect('login');
        }
    }
}
