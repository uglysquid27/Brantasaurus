<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Carousel;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id()){
            $products = Product::select('*')->latest()->take(4)->get();
            $categories = Category::withCount('product')->get();
            $carousels = Carousel::select('*')->latest()->take(2)->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            return view('store.index', compact('products', 'carousels', 'categories', 'cartItem'));
        }else{
            $products = Product::select('*')->latest()->take(4)->get();
            $categories = Category::withCount('product')->get();
            $carousels = Carousel::select('*')->latest()->take(2)->get();
            $user = auth()->user();
            return view('store.index', compact('products', 'carousels', 'categories'));
        }
        
    }
    public function shop()
    {       
        if(Auth::id()){
            $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            return view('store.shop.index', compact('products', 'categories', 'cartItem'));
        }else{
            $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            return view('store.shop.index', compact('products', 'categories'));
        }
    }
    public function contact()
    {
        if(Auth::id()){
            $products = Product::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            return view('store.contact', compact('products', 'categories', 'cartItem'));
        }else{
            $products = Product::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            return view('store.contact', compact('products', 'categories'));
        }
    }

    public function detail(Product $product)
    {
        if(Auth::id()){
            // $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            // $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            return view('store.shop.detail', [
                'products' => $product,
                'categories' => Category::all(),
                'cartItem' => $cartItem,
            ]);
        }else{
            // $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            // $categories = Category::withCount('product')->get();
            $user = auth()->user();
            return view('store.shop.detail', [
                'products' => $product,
                'categories' => Category::all()
            ]);
        }   
        return view('store.shop.detail', [
            'products' => $product,
            'categories' => Category::all()
        ]);
    }
}
