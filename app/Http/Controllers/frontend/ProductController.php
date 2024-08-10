<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function Product_View()
    {
        return view('frontend.product_all.all_product');
    }
}
