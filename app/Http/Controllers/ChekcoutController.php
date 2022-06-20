<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

}
