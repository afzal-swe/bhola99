<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    private $db_orders;







    /**
     * Create a new instance of the controller.
     *
     * This constructor initializes the 'db_orders' property with the name of the 'orders' table.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_orders = "orders";
    }








    /**
     * Display the list of orders.
     *
     * This method retrieves all entries from the 'orders' table, ordered by ID in descending order, and returns
     * the view for displaying the list of orders.
     *
     * @return \Illuminate\View\View
     */
    public function Order_View()
    {

        $order = DB::table($this->db_orders)->orderBy('id', 'DESC')->get();
        return view('backend.order.order_view', compact('order'));
    }









    /**
     * Toggle the delivery status of a specific order.
     *
     * This method updates the delivery status and payment status of an order based on its current delivery status.
     * If the order is marked as delivered, it changes the delivery status to not delivered and sets the payment status
     * to 'Cash On Delivery'. If the order is not delivered, it changes the delivery status to delivered and sets the
     * payment status to 'Paid'. After the update, it redirects to the 'orders_view' route with a success notification.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
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








    /**
     * Delete a specific order.
     *
     * This method deletes an order from the 'orders' table based on its ID. After deletion, it redirects to the
     * 'orders_view' route with a success notification.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Order_Delete($id)
    {

        DB::table($this->db_orders)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'error');
        return redirect()->route('orders_view')->with($notification);
    }








    /**
     * Search for orders based on user input.
     *
     * This method searches for orders in the 'orders' table where the first name, phone number, or product name
     * matches the search term provided in the request. The results are ordered by ID in descending order.
     * After performing the search, it returns the view with the filtered list of orders.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function Order_Search(Request $request)
    {

        $search_test = $request->search;
        $order = DB::table($this->db_orders)->where('first_name', 'LIKE', "%$search_test%")
            ->orWhere('phone', 'LIKE', "%$search_test%")
            ->orWhere('product_name', 'LIKE', "%$search_test%")
            ->orderBy('id', 'DESC')
            ->get();
        return view('backend.order.order_view', compact('order'));
    }
}
