<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ArticleController extends Controller{

    public function index(){
        echo "123";
        return view('admin.article.list_iframe');
    }

}