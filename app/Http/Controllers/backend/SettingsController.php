<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    //
    private $db_socials;
    private $db_seos;
    private $db_website_settings;







    /**
     * Construct a new instance of the class.
     *
     * This constructor initializes database table names used in the class:
     * - `seos` for SEO settings
     * - `socials` for social media settings
     * - `website_settings` for general website settings
     */
    public function __construct()
    {
        $this->db_seos = "seos";
        $this->db_socials = "socials";
        $this->db_website_settings = "website_settings";
    }








    /**
     * Show the social media settings form.
     *
     * If social media settings exist, display the update form with the current settings.
     * Otherwise, show the form to create new social media settings.
     *
     * @return \Illuminate\View\View
     */
    public function Social()
    {
        $social = DB::table($this->db_socials)->first();

        if ($social) {
            return view('backend.setting.social.update', compact('social'));
        } else {
            return view('backend.setting.social.create');
        }
    }









    /**
     * Store new social media settings.
     *
     * Validate the request input and insert the new social media settings into the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Social_Store(Request $request)
    {

        $request->validate([
            'facebook' => 'required',
        ]);

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_socials)->insert($data);


        $notification = array('messege' => 'Social Insert Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }







    /**
     * Update existing social media settings.
     *
     * Validate the request input and update the social media settings in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Social_Update(Request $request, $id)
    {

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_socials)->where('id', $id)->update($data);


        $notification = array('messege' => 'Social Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }


    //// ===== Social function End ===== ////


    /// ===== Seo Function Start ======= ////





    /**
     * Show the SEO settings form.
     *
     * Retrieves SEO settings from the database. If settings exist, displays the update form; otherwise, displays the create form.
     *
     * @return \Illuminate\View\View
     */
    public function Seo()
    {
        $seo = DB::table($this->db_seos)->first();

        if ($seo) {
            return view('backend.setting.seo.update', compact('seo'));
        } else {
            return view('backend.setting.seo.create');
        }
    }








    /**
     * Store new SEO settings.
     *
     * Validates and stores SEO settings in the database. Requires meta author, title, keyword, description, Google Analytics, Google Verification, and Alexa Analytics.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Seo_Store(Request $request)
    {


        $request->validate([
            'meta_author' => 'required',
            'meta_title' => 'required|max:30',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'google_analytics' => 'required',
            'google_verification' => 'required',
            'alexa_analytics' => 'required',
        ]);

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table($this->db_seos)->insert($data);

        $notification = array('messege' => 'SEO Insert Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }








    /**
     * Update existing SEO settings.
     *
     * Updates SEO settings in the database. Requires meta author, title, keyword, description, Google Analytics, Google Verification, and Alexa Analytics.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the SEO settings to update
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Seo_Update(Request $request, $id)
    {


        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table($this->db_seos)->where('id', $id)->update($data);

        $notification = array('messege' => 'SEO Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    //// ===== Seo function End ===== ////


    /// ===== Website Function Start ======= ////




    /**
     * Show website settings page.
     *
     * Displays the form for creating or updating website settings based on whether settings already exist.
     *
     * @return \Illuminate\View\View
     */
    public function Website()
    {

        $setting = DB::table($this->db_website_settings)->first();

        if ($setting) {
            return view('backend.setting.website.update', compact('setting'));
        } else {
            return view('backend.setting.website.create');
        }
    }







    /**
     * Store new website settings.
     *
     * Validates and saves website settings to the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Website_Store(Request $request)
    {

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_website_settings)->insert($data);

        $notification = array('messege' => 'Website Setting Insert Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }








    /**
     * Update existing website settings.
     *
     * Validates and updates website settings in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Website_Update(Request $request, $id)
    {

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_website_settings)->where('id', $id)->update($data);

        $notification = array('messege' => 'Website Setting Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
}
