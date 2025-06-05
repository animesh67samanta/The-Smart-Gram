<?php

namespace App\Http\Controllers\user;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('user.user_create');
    }
}
