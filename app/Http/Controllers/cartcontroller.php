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


        return view('cart', ['cart_items' => $cart_items]);
    }

    public function add($product_id)
    {
        $user_id = auth()->id();
        $cart_item = cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();// поиск товара в базе данных
//если товар есть в базе данных добавить количество +1 только с тем услвием что зачение не больше чем в продуктах
        if ($cart_item) {
            $product = Product::find($cart_item->product_id);
            $cart_item->count++;
            if ($cart_item->count > $product->count) {// Если количество больше выполнить переадресацию на страницу каталог
                return redirect()->back()->with('error','Вы не можете добавит в карзину товар т.к в вашей корзине находится максимальное количество товара');
            } else
            {
                $cart_item->save();
            }
        } else
        {
            //Если товара нет в корзине выполнить его создание
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
            return redirect()->back();
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
