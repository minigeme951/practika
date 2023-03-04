<?php

namespace App\Http\Controllers;

use \App\Models\product;
use \App\Models\category;
use Illuminate\Http\Request;

class adminpanel extends Controller
{
    public function admin()
    {
        $prod = product::all();
        $cat = category::all();
        return view('admin', ['prod' => $prod, 'cat' => $cat]);
    }

    public function proddel($id)
    {
        product::where('id', $id)->delete();
        return redirect(route('admin'));
    }

    public function catdel($id)
    {
        category::where('id', $id)->delete();
        return redirect(route('admin'));
    }

    public function prod()
    {
        $cat = category::all();
        return view('createprod', ['cat' => $cat]);
    }

    public function prodcreate(Request $request)
    {
        $file =$request->file('img_url');
        $filename= $file->getClientOriginalName();
        $file->move(public_path('img'),$filename);


        product::create([
            'name' => $request->input('name'),
            'img_url'=>$filename,
            'price' => $request->input('price'),
            'year_of_production' => $request->input('year_of_production'),
            'country_of_origin' => $request->input('country_of_origin'),
            'category'=>$request->input('category'),
            'model'=>$request->input('model'),
            'count'=>$request->input('category')
            ]);

        return redirect(route('admin'));
    }
    public function catcreate(Request $request)
    {
        category::create(
            [
                'name'=>$request->input('name')
            ]
        );
        return redirect(route('admin'));
    }
}
