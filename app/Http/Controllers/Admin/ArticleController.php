<?php
/**
 * Created by PhpStorm.
 * User: kiwi
 * Date: 2018/1/20
 * Time: 23:00
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(){
        return "article/index";
    }
    public function create(){
        return "article/create";
    }
    public function store(){
        return "article/index";
    }
    public function delete(){
        return "article/index";
    }
}