<?php

namespace App\Http\Controllers;

use App\Models\Product;

//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);

        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->image]]);

        return redirect('cart/show');
    }

    public function show()
    {
        $cart_contents = Cart::content();
        $cart_total = Cart::total();

        $data = [
            'cart_contents' => $cart_contents,
            'cart_total' => $cart_total,
        ];

        return view('frontend.cart', $data);
    }

    public function delete($rowId)
    {
        if ($rowId == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($rowId);
        }

        return back();
    }

    public function update(Request $request)
    {
        $rowId = $request->get('rowId');
        $qty = $request->get('qty');

        Cart::update($rowId, $qty);
    }
}
