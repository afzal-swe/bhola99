<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    private $db_user;

    public function __construct()
    {
        $this->db_user = "users";
    }

    public function User_View()
    {
        $all_user = DB::table($this->db_user)->orderBy('id', 'DESC')->get();

        return view('backend.user.view_user', compact('all_user'));
    }

    // User Store Function
    public function User_Store(Request $request)
    {

        $validate = $request->validate([
            "name" => "required|unique:users",
            "email" => "required|unique:users",
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['status'] = $request->status;
        $data['password'] = Hash::make($request->password);
        $data['slug'] = Str::of($request->name)->slug('-');
        $data['created_at'] = Carbon::now();

        DB::table($this->db_user)->insert($data);

        $notification = array('messege' => 'Added Successfully !', 'alert-type' => 'error');
        return redirect()->route('user.view')->with($notification);
    }
    // User Edit Function
    public function User_Edit($id)
    {

        $edit = DB::table($this->db_user)->where('id', $id)->first();
        return view('backend.user.update_user', compact('edit'));
    }

    // User Delete Function
    public function User_Delete($slug)
    {

        DB::table($this->db_user)->where('slug', $slug)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'error');
        return redirect()->route('user.view')->with($notification);
    }
}
