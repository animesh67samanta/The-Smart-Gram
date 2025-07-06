<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class WebviewController extends Controller
{
    public function index()
    {
        return view('web.pages.home');
    }
    public function aboutUs()
    {
        return view('web.pages.aboutus');
    }
    public function contactUs()
    {
        return view('web.pages.contactus');
    }

    public function contactUsSubmit(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|string'
        ]);
        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with('success', 'Message sent successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }   
    }
}
