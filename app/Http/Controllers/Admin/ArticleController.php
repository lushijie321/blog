<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller{

    public function index(){
        return view('admin.article.list_iframe');
    }

    public function add(Request $request){
        /*
        if ($request->isMethod('post')) {
            echo "post";
            $name = $request->input('name');
            echo $name;
        }*/
        $input = $request->all();
        print_r($input);
        //$name = $request->input('name');

        return view('admin.article.add');
    }

    public function edit(Request $request){

        return view('admin.article.edit');
    }

    public function del(){
        return view('admin.article.del');
    }

}