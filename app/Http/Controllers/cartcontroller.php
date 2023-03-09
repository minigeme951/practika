<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;

class cartcontroller extends Controller
{
    public function index()
    {
        $user_id = auth()->id();

        $cart_items = cart::where('user_id', $user_id)->get();


        return view('cart', compact('cart_items') );
    }

    public function add($product_id)
    {
        $user_id = auth()->id();

        cart::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        return redirect()->route('cartIndex');
    }

    public function remove($id)
    {
        cart::where('id',$id)->delete();

        return redirect(url('/cart'));
    }
}
