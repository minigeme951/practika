<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class product extends Controller
{
    public function prodlist($name='id', $sort='desc'){
        $prod=\App\Models\product::orderby($name, $sort)->get();
    return view('cataloglist',['prod'=>$prod]);
    }
}
