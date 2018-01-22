<?php
/**
 * Created by PhpStorm.
 * User: kiwi
 * Date: 2018/1/22
 * Time: 22:04
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
class RegisterController extends Controller
{

    public function index(){

        return view("front.register.index");
    }


    public function register(){

    }
}