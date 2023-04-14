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

    public function prod()
    {
        $cat = category::all();
        return view('createprod', ['cat' => $cat]);
    }

    public function prodedit($id)
    {
        $prod = product::where('id', $id)->get();
        $cat = category::all();
        return view('editprod', ['cat' => $cat, 'prod' => $prod]);
    }

    public function produpdate(Request $request, $id)
    {
        $product = product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->year_of_production = $request->input('year_of_production');
        $product->country_of_origin = $request->input('country_of_origin');
        $product->category = $request->input('category');
        $product->model = $request->input('model');
        $product->count = $request->input('count');

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $request->file('img_url')->move(public_path('img'), $filename);
            $product->img_url = $filename;
            $product->save();
        } else {
            $product->save();
        }
        return redirect(route('admin'));
    }

    public function prodcreate(Request $request)
    {
        $file = $request->file('img_url');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);


        product::create([
            'name' => $request->input('name'),
            'img_url' => $filename,
            'price' => $request->input('price'),
            'year_of_production' => $request->input('year_of_production'),
            'country_of_origin' => $request->input('country_of_origin'),
            'category' => $request->input('category'),
            'model' => $request->input('model'),
            'count' => $request->input('count')
        ]);

        return redirect(route('admin'));
    }

    public function catcreate(Request $request)
    {
        category::create(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect(route('admin'));
    }

    public function catdel($id)
    {
        category::where('id', $id)->delete();
        product::where('category', $id)->delete();
        return redirect(route('admin'));
    }

    public function catedit($id)
    {
        $cat = category::where('id', $id)->get();
        return view('editcat', ['cat' => $cat]);
    }

    public function catupdate(Request $request, $id)
    {
        $cat = category::find($id);
        $cat->name = $request->input('name');
        $cat->save();
        return redirect(route('admin'));
    }
}
