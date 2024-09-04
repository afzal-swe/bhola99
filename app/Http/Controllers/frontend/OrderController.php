<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe;


class OrderController extends Controller
{
    //
    private $db_order;
    private $db_cart;




    /**
     * Constructor to initialize database table names.
     */
    public function __construct()
    {
        $this->db_order = "orders";
        $this->db_cart = "cart";
    }








    /**
     * Place a cash on delivery order.
     *
     * This method retrieves the current user's cart items, creates a new order for each item, 
     * and then deletes the item from the cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Cash_Order()
    {

        $user = Auth::user()->id;

        // Retrieve cart items for the current user
        $data_view = DB::table($this->db_cart)->where('user_id', $user)->get();

        // Process each cart item
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

            // dd($card_data);

            // Insert order data into the orders table
            DB::table($this->db_order)->insert($data);

            $cart_id = $card_data->id;

            // Delete the item from the cart
            $cart_delete = DB::table($this->db_cart)->where('id', $cart_id)->delete();
        }

        // Redirect back with a success notification
        $notification = array('message' => 'Order Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }







    /**
     * Show the Stripe payment page.
     *
     * This method returns the view for Stripe payment, passing the total price of the order.
     *
     * @param float $total_price The total price of the order
     * @return \Illuminate\View\View
     */
    public function Stripe($total_price)
    {
        return view('frontend.stripe.stripe', compact('total_price'));
    }







    /**
     * Handle the Stripe payment and create an order.
     *
     * This method processes the payment using Stripe, then creates an order entry and deletes the items from the cart.
     *
     * @param \Illuminate\Http\Request $request The request instance containing payment details
     * @param float $total_price The total price of the order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stripePost(Request $request, $total_price)
    {
        // Set the Stripe API key
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        // Create a charge using Stripe
        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment!"
        ]);


        // Retrieve the authenticated user's ID
        $user = Auth::user()->id;


        // Get cart items for the user
        $data_view = DB::table($this->db_cart)->where('user_id', $user)->get();

        // Iterate over cart items and create orders
        foreach ($data_view as $card_data) {

            $data = array();
            $data['first_name'] = $card_data->user_name;
            $data['email'] = $card_data->user_email;
            $data['phone'] = $card_data->user_phone;
            $data['address'] = $card_data->user_address;
            $data['user_id'] = $card_data->user_id;

            $data['product_name'] = $card_data->product_title;
            $data['payment_status'] = "Paid";
            $data['delivery_status'] = "Processing";
            $data['product_price'] = $card_data->price;
            $data['product_quantity'] = $card_data->quantity;
            $data['product_id'] = $card_data->product_id;
            $data['total'] = $card_data->price;
            $data['image'] = $card_data->image;
            $data['created_at'] = Carbon::now();

            // dd($card_data);

            // Insert the order data into the database
            DB::table($this->db_order)->insert($data);

            $cart_id = $card_data->id;

            // Delete the item from the cart
            $cart_delete = DB::table($this->db_cart)->where('id', $cart_id)->delete();
        }

        // Flash a success message to the session
        Session::flash('success', 'Payment successful!');

        // Redirect back to the previous page
        return back();
    }








    /**
     * Display the orders for the authenticated user.
     *
     * This method retrieves the orders for the currently authenticated user and returns a view to display them.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function View_Order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;

            $order = DB::table($this->db_order)->where('user_id', $user_id)->get();
            return view('frontend.order.order', compact('order'));
        } else {
            return redirect('login');
        }
    }







    /**
     * Cancel an order.
     *
     * This method updates the delivery status of a specific order to "canceled" (status code '2').
     *
     * @param int $id The ID of the order to be canceled.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Order_Cancel($id)
    {
        $order = DB::table($this->db_order)->where('id', $id)->first();

        $data = array();
        $data['delivery_status'] = '2';

        DB::table($this->db_order)->where('id', $id)->update($data);

        Alert::success('Order Cancel Successfully', 'We have addeed product to the cart');
        return redirect()->back();
    }
}
