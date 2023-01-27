<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function userLoginIndex(){
        return view('auth-sales-tracker.login');
    }
    public function userRegisterIndex(){
        return view('auth-sales-tracker.register');
    }
}
