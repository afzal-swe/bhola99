<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //
    private $db_order;
    private $db_cart;

    public function __construct()
    {
        $this->db_order = "orders";
        $this->db_cart = "cart";
    }

    // 
    public function Cash_Order()
    {

        $user = Auth::user()->id;


        $data_view = DB::table($this->db_cart)->where('user_id', $user)->get();

        // dd($user_id);
        foreach ($data_view as $card_data) {

            $data = array();
            $data['first_name'] = $card_data->user_name;
            $data['email'] = $card_data->user_email;
            $data['phone'] = $card_data->user_phone;
            $data['address'] = $card_data->user_address;
            $data['user_id'] = $card_data->user_id;

            $data['product_name'] = $card_data->product_title;
            $data['payment_status'] = "Cash On Delivery";
            $data['delivery_status'] = "Processing";
            $data['product_price'] = $card_data->price;
            $data['product_quantity'] = $card_data->quantity;
            $data['product_id'] = $card_data->product_id;
            $data['total'] = $card_data->price;
            $data['image'] = $card_data->image;
            $data['created_at'] = Carbon::now();

            DB::table($this->db_order)->insert($data);

            $cart_id = $card_data->id;

            $cart_delete = DB::table($this->db_cart)->where('id', $cart_id)->delete();
        }


        $notification = array('message' => 'Order Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
