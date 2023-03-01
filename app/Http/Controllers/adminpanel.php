<?php

namespace App\Http\Controllers;
use \App\Models\product;
use \App\Models\category;
use Illuminate\Http\Request;

class adminpanel extends Controller
{
    public function admin(){
        $prod =product::all();
        $cat =category::all();
        return view('admin',['prod'=>$prod,'cat'=>$cat]);
    }
    public function proddel($id){
        product::where('id',$id)->delete();
        return redirect(route('admin'));
    }
    public function catdel($id){
        category::where('id',$id)->delete();
        return redirect(route('admin'));
    }
}
