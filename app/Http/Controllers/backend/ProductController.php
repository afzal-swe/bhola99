<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //
    private $db_products;
    private $db_category;

    public function __construct()
    {
        $this->db_products = "products";
        $this->db_category = "categories";
    }

    public function Product_View()
    {
        $product = DB::table($this->db_products)->orderBy('id', 'DESC')->get();
        return view('backend.products.product_view', compact('product'));
    }

    // Create Product From
    public function Products_Create()
    {
        $category = DB::table($this->db_category)->get();
        return view('backend.products.create_product', compact('category'));
    }

    // Product Store Function
    public function Product_Store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([

            "title" => "required|unique:products",
            "image" => "required",
            "price" => "required",
            "quantity" => "required",
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['price'] = $request->price;
        $data['quantity'] = $request->quantity;
        $data['description'] = $request->description;
        $data['catagory'] = $request->catagory;
        $data['discount_price'] = $request->discount_price;
        $data['slug'] = Str::of($request->title)->slug('-');
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(350, 350)->save("images/products/" . $image_one);
            $data['image'] = "images/products/" . $image_one;
        }

        DB::table($this->db_products)->insert($data);

        $notification = array('messege' => 'Product Added Successfully !', 'alert-type' => 'error');
        return redirect()->route('products.view')->with($notification);
    }


    // Product Edit Function
    public function Product_Edit($slug)
    {
        $edit = DB::table($this->db_products)->where('slug', $slug)->first();
        $category = DB::table($this->db_category)->get();

        return view('backend.products.product_update', compact('edit', 'category'));
    }

    // Product Update Section
    public function Product_Update(Request $request, $slug)
    {



        $data = array();
        $data['title'] = $request->title;
        $data['price'] = $request->price;
        $data['quantity'] = $request->quantity;
        $data['description'] = $request->description;
        $data['catagory'] = $request->catagory;
        $data['discount_price'] = $request->discount_price;
        $data['slug'] = Str::of($request->title)->slug('-');
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        $image = $request->image;
        $oldimage = $request->oldimage;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(350, 350)->save("images/products/" . $image_one);
            $data['image'] = "images/products/" . $image_one;

            DB::table($this->db_products)->where('slug', $slug)->update($data);
            unlink($oldimage);

            $notification = array('messege' => 'Product Update Successfully !', 'alert-type' => 'error');
            return redirect()->route('products.view')->with($notification);
        }

        $data['image'] = $oldimage;

        DB::table($this->db_products)->where('slug', $slug)->update($data);

        $notification = array('messege' => 'Product Update Successfully !', 'alert-type' => 'error');
        return redirect()->route('products.view')->with($notification);
    }

    // Product Delete Function
    public function Product_Delete($slug)
    {

        $img = DB::table($this->db_products)->where('slug', $slug)->first();

        if ($img !== "image") {
            $delete_img = $img->image;
            unlink($delete_img);

            DB::table($this->db_products)->where('slug', $slug)->delete();

            $notification = array('messege' => 'Product Delete Successfully !', 'alert-type' => 'error');
            return redirect()->route('products.view')->with($notification);
        }
    }
}
