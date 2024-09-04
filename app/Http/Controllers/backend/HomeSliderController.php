<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class HomeSliderController extends Controller
{

    //

    private $db_home_slider;






    /**
     * Create a new instance of the controller.
     *
     * This constructor initializes the 'db_home_slider' property with the name of the 'home_slider' table.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_home_slider = 'home_slider';
    }








    /**
     * Display the list of home sliders.
     *
     * This method retrieves all entries from the 'home_slider' table, ordered by ID in descending order, and returns
     * the view for displaying the list of home sliders.
     *
     * @return \Illuminate\View\View
     */
    public function Home_Slider_View()
    {
        $slider = DB::table($this->db_home_slider)->orderBy('id', 'DESC')->get();
        return view('backend.home_slider.view', compact('slider'));
    }









    /**
     * Store a new home slider entry.
     *
     * This method validates the request, including required image and status fields, and creates a new entry in the
     * 'home_slider' table. If an image is provided, it is resized and saved to a specific directory. After inserting
     * the data, the method redirects back with a success alert.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Home_Slider_Store(Request $request)
    {

        $validate = $request->validate([

            'image' => 'required',
            'status' => 'required',
        ], [
            'image.required' => 'This image is required',
            'status.required' => 'This status is required',
        ]);

        $data = array();
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->image;

        if ($image) {

            $name_gan = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1842, 1052)->save('images/home_slider/' . $name_gan);
            $data['image'] = 'images/home_slider/' . $name_gan;
        }

        DB::table($this->db_home_slider)->insert($data);

        Alert::success('Message Delete Successfully', 'We have addeed product to the cart');
        return redirect()->back();
    }









    /**
     * Delete a specific home slider entry.
     *
     * This method deletes the slider entry with the specified ID from the 'home_slider' table. It also removes the
     * associated image file from the server. After deletion, it redirects back with a success alert.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Slider_Delete($id)
    {


        $slider_data = DB::table($this->db_home_slider)->where('id', $id)->first();

        $old_image = $slider_data->image;
        unlink($old_image);

        DB::table($this->db_home_slider)->where('id', $id)->delete();

        Alert::success('Delete Successfully', 'We have addeed product to the cart');
        return redirect()->back();
    }
}
