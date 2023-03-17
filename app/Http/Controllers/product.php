<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class product extends Controller
{
    public function prodlist($name = 'id', $sort = 'desc')
    {
        $prod = \App\Models\product::orderby($name, $sort)->where('count', '>', '0')->get();
        $cat = \App\Models\category::all();
        return view('cataloglist', ['prod' => $prod, 'cat' => $cat]);
    }

    public function filterr($id)
    {
        $prod = \App\Models\product::where('category', $id)->get();
        $cat = \App\Models\category::all();
        return view('cataloglist', ['prod' => $prod, 'cat' => $cat]);
    }
}
