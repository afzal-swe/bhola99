<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    private $db_categories;

    public function __construct()
    {
        $this->db_categories = "categories";
    }

    public function Category_View()
    {
        $category = DB::table($this->db_categories)->get();
        return view('backend.category.view', compact('category'));
    }

    // Create Category Section
    public function Category_Create(Request $request)
    {
        $validate = $request->validate([

            "name" => "required|unique:categories"
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = Str::of($request->name)->slug('-');
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_categories)->insert($data);
        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'error');
        return redirect()->route('category.view')->with($notification);
    }

    // Edit Category
    public function Category_Edit($id)
    {
        $data = DB::table($this->db_categories)->where('id', $id)->first();
        return view('backend.category.update', compact('data'));
    }

    // Category Update 
    public function Category_Update(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = Str::of($request->name)->slug('-');
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_categories)->where('id', $request->id)->update($data);
        $notification = array('messege' => 'Update Successfully !', 'alert-type' => 'error');
        return redirect()->route('category.view')->with($notification);
    }

    // Delete Category
    public function Category_Delete($slug)
    {

        DB::table($this->db_categories)->where('slug', $slug)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'error');
        return redirect()->route('category.view')->with($notification);
    }
}
