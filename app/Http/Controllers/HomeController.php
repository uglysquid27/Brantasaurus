<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $products = Product::select('*')->latest()->take(4)->get();
        $categories = Category::withCount('product')->get();
        return view('store.index', compact('products', 'categories'));
    }
    public function shop()
    {       
        $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
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

    public function addcart(Request $request, $id ){
        if(Auth::id()){
            $user=auth()->user();
            $product=product::find($id);
            $cart=new cart;

            $cart->name=$user->name;
            // $cart->phone=$user->phone;
            // $cart->address=$user->address;
            $cart->product_name=$product->product_name;
            $cart->price=$product->sell_price;
            $cart->quantity=$request->quantity;
            $cart->save();

            return redirect()->back()->with('message','Product successfully added to cart');;
        }else{
            return redirect('login');
        }
    }
}
