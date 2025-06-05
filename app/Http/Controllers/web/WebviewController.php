<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
