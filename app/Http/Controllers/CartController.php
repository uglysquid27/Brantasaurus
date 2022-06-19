<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addcart(Request $request, $id)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('quantity');

        if (Auth::id()) 
        {
            $product_check = Product::where('id', $product_id);

            if ($product_check) 
            {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first()) 
                {
                    return redirect()->back()->with('message', 'Product Already in the Cart');
                } 
                else 
                {
                    $user = auth()->user();
                    $product = Product::find($id);
                    $cart = new Cart;
        
                    $cart->user_id = $user->id;
                    $cart->product_id = $product_id;
                    $cart->quantity = $product_qty;
                    $cart->price = $product->sell_price * $cart->quantity;
                    $cart->save();
        
                    return redirect()->back()->with('message', 'Product Successfully Added to Cart');
                }
            }
        } else {
            return redirect('login');
        }
    }

    public function showcart()
    {
        if (Auth::id()) {
            $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = cart::where('name', $user->name)->count();
            return view('store.shop.showcart', compact('products', 'categories', 'cartItem'));
        } else {
            $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            // $cartItem = cart::where('name', $user->name)->count();
            return view('store.shop.showcart', compact('products', 'categories'));
        }
    }
}
