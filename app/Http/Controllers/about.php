<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class about extends Controller
{
    public function slider(){
        $s= \App\Models\product::Orderby("id","desc")-> limit(5)->get();
    return view('index',['prod'=>$s]);
    }
}
