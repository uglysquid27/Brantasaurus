<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChekcoutController extends Controller
{
    public function index(){
        if(Auth::id()){
            $products = Product::select('*')->latest()->take(4)->get();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartProduct = Cart::where('user_id', $user->id, Auth::id())->get();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            return view('store.shop.checkout', compact('products', 'categories', 'user', 'cartItem', 'cartProduct'));
        }else{
            $products = Product::select('*')->latest()->take(4)->get();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            return view('store.shop.checkout', compact('products', 'categories'));
        }
        // return view('store.shop.checkout');
    }

    public function placeOrder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->zip = $request->input('postal');

        // to calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod){
            $total += $prod->product->sell_price * $prod->quantity;
        }

        $order->total_price = $total;
        $order->tracking_num = 'num'.rand(1111,9999);
        $order->save();

        $order->id;
        $cartProduct = Cart::where('user_id', Auth::id())->get();
        foreach($cartProduct as $cart){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->sell_price,
            ]);

            $prod = Product::where('id', $cart->product_id)->first();
            $prod->quantity = $prod->quantity - $cart->quantity;
            $prod->update();
        }
        
        if(Auth::user()->address == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('postal');
            $user->update();
        }
        
        $cartProduct = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartProduct); 

        return redirect('/')->with('message','Order Succesfully');
    }

    // if(Auth::user()-)

}
