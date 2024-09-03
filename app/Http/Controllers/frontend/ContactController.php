<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    //

    private $db_contacts;

    public function __construct()
    {
        $this->db_contacts = 'contacts';
    }

    public function Contact_View()
    {
        return view('frontend.contact.contact');
    }


    public function Send_Message(Request $request)
    {
        $validate = $request->validate([

            'name'  => 'required',
            'email'  => 'required',
            'subject'  => 'required',
            'message'  => 'required',
        ], [
            'name.required' => 'This name is required',
            'email.required' => 'This email is required',
            'subject.required' => 'This subject is required',
            'message.required' => 'This message is required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_contacts)->insert($data);

        Alert::success('Send Message Successfully', 'We have addeed product to the cart');
        return redirect()->back();
    }


    // Adin Contact view function
    public function Admin_Contact_View()
    {
        $view = DB::table($this->db_contacts)->get();
        return view('backend.contact.view', compact('view'));
    }


    public function Admin_Contact_Delete($id)
    {


        DB::table($this->db_contacts)->where('id', $id)->delete();

        Alert::success('Message Delete Successfully', 'We have addeed product to the cart');
        return redirect()->back();
    }
}
