<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    /**
     * Display the blog view page.
     *
     * @return \Illuminate\View\View
     */
    public function Blog()
    {
        return view('frontend.blog.blog_view');
    }
}
