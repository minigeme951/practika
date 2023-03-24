<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{
    public function index()
    {
        $user_id = auth()->id();

        $cart_items = cart::where('user_id', $user_id)->get();


        return view('cart', compact('cart_items'));
    }

    public function add($product_id)
    {
        $user_id = auth()->id();
        $cart_item = cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cart_item) {
            // If the product is already in the cart, increment its quantity
            $cart_item->count++;
            $cart_item->save();
        } else {
            // If the product is not in the cart, create a new cart item
            cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
        }


        return redirect()->route('cartIndex');
    }

    public function update(Request $request, $id)
    {
        $cart_item = cart::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        $product = Product::find($cart_item->product_id);
        if ($request->input('count') > $product->count) {
            return redirect()->back()->with('error', 'Sorry, there are only ' . $product->count . ' units of this product available.');
        }
        if ($request->input('count') > 0) {
            $cart_item->count = $request->input('count');
            $cart_item->save();
        } else {
            $cart_item->delete();
        }
            return redirect()->route('cartIndex');
    }



    public function remove($id)
    {
        cart::where('id', $id)->delete();
        return redirect(url('/cart'));
    }
}
