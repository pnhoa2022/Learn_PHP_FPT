<?php

namespace App\Http\Controllers;

use App\Models\Product;

//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Session\Session;

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

        return redirect('cart/show#list-cart');
    }

    public function update(Request $request)
    {
        $rowId = $request->get('rowId');
        $qty = $request->get('qty');

        Cart::update($rowId, $qty);
    }

    public function postMail(Request $request)
    {
        $info = $request->all();
        $cart_products = Cart::content();
        $cart_total = Cart::total();

        $data = [
            'info' => $info,
            'cart_products' => $cart_products,
            'cart_total' => $cart_total,
        ];

        $email = $request->get('email');

        Mail::send('frontend.email', $data, function ($message) use ($email) {
            $message->from('ars.codedy@gmail.com', 'ARS.CODEDY (VietPRO SHOP)');
            $message->to($email, $email);
            //$message->cc('', ''); //gửi cho chủ cửa hàng
            $message->subject('ARS.CODEDY (VietPRO SHOP) | Xác nhận mua hàng');
        });

        Cart::destroy();

        return redirect('cart/complete')->with('status', 'order_complete');
    }

    public function complete()
    {
        if (session('status') == 'order_complete') {
            return view('frontend.complete');
        } else {
            return redirect('/');
        }
    }
}
