<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller

{
    public $checkout_message = '';

    public function showcart()
    {
        if (Auth::id()) {
            $products = Product::latest()->filter(request(['search', 'category', 'tag']))->paginate('12');
            $tags = Tag::all();
            $sizes = Cart::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            $cartItems = Cart::where('user_id', Auth::id())->get();
            return view('store.shop.cart', compact('products', 'categories', 'cartItem', 'sizes', 'tags', 'cartItems'));
        } else {
            return redirect('login');
        }
    }

    public function addcart(Request $request, $id)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('quantity');
        $product_size = $request->input('product_size');
        

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
                    $cart->size = $product_size;
                    $cart->save();
        
                    return redirect()->back()->with('message', 'Product Successfully Added to Cart');
                }
            }
        } else {
            return redirect('login');
        }
    }    

    public function update($id, $quantity){
        $cart = Cart::where('id', $id)->increment('quantity', $quantity);
        return redirect()->back()->with('message', 'Product Quantity Update');
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'Product Successfully Delete from Cart');
    }

    // public function checkout(){
    //     $cart = Cart::where('user_id', auth()->id())->get();
    //     foreach ($cart as $cartProduct){
    //         $product = Product::find($cartProduct->product_id);
    //         if($product || !$product->quantity < $cartProduct->quantity){
    //            $this->$checkout_message = 'Error: Product not found in stock';
    //         }
    //     }
    // }
}
