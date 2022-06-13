<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
        $products = Product::select('*')->latest()->take(4)->get();
        $categories = Category::withCount('product')->get();
        return view('store.index', compact('products', 'categories'));
    }
    public function shop()
    {       
        $products = Product::latest()->filter(request(['search', 'category', 'tag']))->get();
        $categories = Category::withCount('product')->get();
        return view('store.shop.index', compact('products', 'categories'));
    }
    public function contact()
    {
        $products = Product::all();
        $categories = Category::withCount('product')->get();
        return view('store.contact', compact('products', 'categories'));
    }

    public function detail(Product $product)
    {
        return view('store.shop.detail', [
            'products' => $product,
            'categories' => Category::all()
        ]);
    }
}
