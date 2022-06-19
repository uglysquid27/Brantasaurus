<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        
        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => "Already added to cart"]);
                }else{
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." Added to Cart"]);
                    
                }
               
                
            }
        }else{
            return response()->json(['status' => "login to Continue"]);
        }
    }
}