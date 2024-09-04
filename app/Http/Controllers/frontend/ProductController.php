<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    private $db_products;




    /**
     * Constructor for initializing the database table names.
     *
     * This method sets the table name for products, which is used throughout the class.
     */
    public function __construct()
    {
        $this->db_products = "products";
    }





    /**
     * Retrieve and display a paginated list of products.
     *
     * This method fetches products from the database, paginates the results to show 12 products per page,
     * and returns a view to display the list of products.
     *
     * @return \Illuminate\View\View
     */
    public function Product_View()
    {
        $product = DB::table($this->db_products)->paginate(12);
        return view('frontend.product_all.all_product', compact('product'));
    }
}
