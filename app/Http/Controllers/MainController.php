<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // these
    public function editProfile(){
        return view('pages.profile');
    }
    public function editPass(){
        return view('pages.password');
    }
    public function ads(){
        return view('pages.ads');
    }
    public function categories(){
        return view('pages.categories');
    }
    public function events(){
        return view('pages.events');
    }
    public function login(){
        return view('pages.login');
    }

}
