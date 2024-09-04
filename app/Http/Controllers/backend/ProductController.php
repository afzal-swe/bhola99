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





    /**
     * Create a new instance of the controller.
     *
     * This constructor initializes the 'db_products' property with the name of the 'products' table and the 'db_category'
     * property with the name of the 'categories' table.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_products = "products";
        $this->db_category = "categories";
    }






    /**
     * Display the list of products.
     *
     * This method retrieves all products from the 'products' table, along with their associated category names from the
     * 'categories' table. The results are ordered by product ID in descending order. After retrieving the data, it returns
     * the view for displaying the list of products.
     *
     * @return \Illuminate\View\View
     */
    public function Product_View()
    {
        $product = DB::table($this->db_products)
            ->join('categories', 'products.catagory', 'categories.id')
            ->select('products.*', 'categories.name')
            ->orderBy('id', 'DESC')->get();
        return view('backend.products.product_view', compact('product'));
    }







    /**
     * Show the form for creating a new product.
     *
     * This method retrieves all categories from the 'categories' table and returns the view for creating a new product,
     * passing the category data to the view.
     *
     * @return \Illuminate\View\View
     */
    public function Products_Create()
    {
        $category = DB::table($this->db_category)->get();
        return view('backend.products.create_product', compact('category'));
    }








    /**
     * Store a newly created product in the database.
     *
     * This method validates the incoming request data for product creation, including title, image, price, and quantity.
     * It then prepares the product data, including image processing, and inserts it into the 'products' table. After
     * successfully storing the product, it redirects to the product view page with a success notification.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
            Image::make($image)->resize(295, 380)->save("images/products/" . $image_one);
            $data['image'] = "images/products/" . $image_one;
        }

        DB::table($this->db_products)->insert($data);

        $notification = array('messege' => 'Product Added Successfully !', 'alert-type' => 'error');
        return redirect()->route('products.view')->with($notification);
    }








    /**
     * Show the form for editing a specific product.
     *
     * This method retrieves the product data based on the provided slug and also retrieves all categories from the
     * 'categories' table. It then returns the view for editing the product, passing both the product data and category
     * data to the view.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function Product_Edit($slug)
    {
        $edit = DB::table($this->db_products)->where('slug', $slug)->first();
        $category = DB::table($this->db_category)->get();

        return view('backend.products.product_update', compact('edit', 'category'));
    }








    /**
     * Update the specified product in the database.
     *
     * This method updates the product details in the 'products' table based on the provided slug. If a new image is
     * uploaded, it will replace the old image and update the product record. If no new image is provided, the old
     * image will be retained.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
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
            Image::make($image)->resize(295, 380)->save("images/products/" . $image_one);
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








    /**
     * Remove the specified product from the database.
     *
     * This method deletes the product record from the 'products' table based on the provided slug. If the product has
     * an associated image, the image file will be removed from the server.
     *
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
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
