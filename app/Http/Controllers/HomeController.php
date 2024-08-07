<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    private $db_users;


    public function __construct()
    {
        $this->db_users = "users";
    }

    public function backend_home_page()
    {

        // Auth::check()
        $usertype = Auth::user()->usertype;

        if ($usertype == "1") {
            return view('backend.layouts.main');
        } else {
            return view('frontend.app');
        }
    }

    // Frontend Home Page
    public function frontend_home_page()
    {
        return view('frontend.app');
    }
}
