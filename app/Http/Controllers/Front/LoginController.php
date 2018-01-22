<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(){

        return view("front.login.index");
    }

    public function login(){

    }

    public function logout(){

    }
}
