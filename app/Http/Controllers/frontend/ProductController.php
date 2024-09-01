<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    private $db_products;

    public function __construct()
    {
        $this->db_products = "products";
    }

    public function Product_View()
    {
        $product = DB::table($this->db_products)->paginate(12);
        return view('frontend.product_all.all_product', compact('product'));
    }
}
