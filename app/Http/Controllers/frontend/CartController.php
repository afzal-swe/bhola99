<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    //
    private $db_products;
    private $db_cart;




    /**
     * Constructor to initialize database table names.
     */
    public function __construct()
    {
        $this->db_products = "products";
        $this->db_cart = "cart";
    }







    /**
     * Add a product to the cart for the authenticated user.
     *
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
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

            Alert::success('Add to Cart Successfully', 'We have addeed product to the cart');
            return redirect()->back();

            // $notification = array('message' => 'Add to Cart Successfully', 'alert-type' => 'success');
            // return redirect()->back()->with($notification);
        } else {
            return redirect('login');
        }
    }







    /**
     * Display the cart for the authenticated user.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function Show_Cart()
    {

        if (Auth::id()) {
            $id = Auth::user()->id;

            $cart_view = DB::table($this->db_cart)->where('user_id', $id)->get();
            // $cart_view = Cart::where('user_id', '=', $id)->get();

            return view('frontend.cart.cart_view', compact('cart_view'));
        } else {
            return redirect('login');
        }
    }







    /**
     * Remove a product from the cart.
     *
     * @param int $id The ID of the product to remove from the cart.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Cart_Product_Remove($id)
    {
        DB::table($this->db_cart)->where('id', $id)->delete();

        Alert::warning('Product Removed Successfully', 'We have removed product to the cart');
        return redirect()->back();
    }
}
