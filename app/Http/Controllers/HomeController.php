<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $products = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.index', compact('products', 'count'));
    }

    public function login_user()
    {
        $products = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.index', compact('products', 'count'));
    }

    public function product_details($id)
    {
        $id = base64_decode($id);
        $products = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.product-details', compact('products', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();
        return redirect()->back();
    }

    public function cart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $carts = Cart::where('user_id', $user_id)->get();
        }
        return view('home.cart', compact('count', 'carts'));
    }

    public function remove_product($id)
    {
        $id = base64_decode($id);
        $cart_product = Cart::find($id);
        $cart_product->delete();
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $address = $request->cust_address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id', $userid)->get();

        foreach ($carts as $cart) {
            $order = new Order;
            $order->name = $name;
            $order->email = $email;
            $order->cust_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->save();
        }

        $cart_items = Cart::where('user_id', $userid)->get();

        foreach ($cart_items as $cart_item) {
            $product = Cart::find($cart_item->id);
            $product->delete();
        }

        return redirect()->back();
    }

    public function checkout()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $count = '';
        }
        if ($count == 0) {
            return redirect()
                ->route('cart');
        }

        return view('home.checkout', compact('count', 'carts'));
    }
}
