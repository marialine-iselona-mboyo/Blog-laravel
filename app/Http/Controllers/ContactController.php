<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('partials/contact');
    }
    
    //Store contact Form
    public function store(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        //Store data in database
        Contact::create($request->all());

        //Send mail to admin
        \Mail::send('emails/contacts-message', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('marialine.iselona.mboyo@student.ehb.be', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'Message has been sent! Thank you for contacting us!');
    }
}
