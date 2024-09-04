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






    /**
     * Create a new instance of the controller.
     *
     * This constructor initializes the 'db_categories' property with the name of the 'categories' table.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_categories = "categories";
    }







    /**
     * Display the list of categories.
     *
     * This method retrieves all categories from the 'categories' table, ordered by ID in descending order, and returns
     * the view for displaying the list of categories.
     *
     * @return \Illuminate\View\View
     */
    public function Category_View()
    {
        $category = DB::table($this->db_categories)->orderBy('id', 'DESC')->get();
        return view('backend.category.view', compact('category'));
    }









    /**
     * Store a newly created category.
     *
     * This method validates the request data, creates a new category in the 'categories' table with the provided name,
     * slug, status, and current timestamp, and then redirects to the 'category.view' route with a success notification.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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








    /**
     * Display the form to edit a specific category.
     *
     * This method retrieves the details of a category by its ID and returns the view for editing the category's
     * information, passing the category data to the view.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function Category_Edit($id)
    {
        $data = DB::table($this->db_categories)->where('id', $id)->first();
        return view('backend.category.update', compact('data'));
    }










    /**
     * Update a specific category.
     *
     * This method updates the details of a category in the 'categories' table, including its name, slug, status,
     * and updated timestamp. After the update, it redirects to the 'category.view' route with a success notification.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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








    /**
     * Delete a specific category.
     *
     * This method deletes a category from the 'categories' table based on its slug.
     * After deletion, it redirects to the 'category.view' route with a success notification.
     *
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Category_Delete($slug)
    {

        DB::table($this->db_categories)->where('slug', $slug)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'error');
        return redirect()->route('category.view')->with($notification);
    }
}
