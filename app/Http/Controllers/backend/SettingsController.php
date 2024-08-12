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

    public function __construct()
    {
        $this->db_seos = "seos";
        $this->db_socials = "socials";
        $this->db_website_settings = "website_settings";
    }

    // Social Function
    public function Social()
    {


        $social = DB::table($this->db_socials)->first();

        if ($social) {
            return view('backend.setting.social.update', compact('social'));
        } else {
            return view('backend.setting.social.create');
        }
    }

    // Social Link Store
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
    // Social Update Function
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
}
