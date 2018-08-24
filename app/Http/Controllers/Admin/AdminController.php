<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller{

    public function index(){

        echo "admin控制器";
        return view('admin.index');
    }

}