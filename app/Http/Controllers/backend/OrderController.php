<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    private $db_orders;


    public function __construct()
    {
        $this->db_orders = "orders";
    }

    public function Order_View()
    {

        $order = DB::table($this->db_orders)->orderBy('id', 'DESC')->get();
        return view('backend.order.order_view', compact('order'));
    }

    // Order Delivery function
    public function Order_Delivery($id)
    {

        $order = DB::table($this->db_orders)->where('id', $id)->first();
        // dd($order);

        $data = array();
        if ($order->delivery_status == "1") {
            $data['delivery_status'] = "0";
            $data['payment_status'] = "Cash On Delivery";
        } else {
            $data['delivery_status'] = "1";
            $data['payment_status'] = "Paid";
        }



        DB::table($this->db_orders)->where('id', $id)->update($data);

        $notification = array('messege' => 'Update Successfully !', 'alert-type' => 'error');
        return redirect()->route('orders_view')->with($notification);
    }

    // Order Delete Function
    public function Order_Delete($id)
    {

        DB::table($this->db_orders)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'error');
        return redirect()->route('orders_view')->with($notification);
    }
}
