<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id()) {
            $products = Product::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            $orders = Order::where('status', '3')->where('user_id', Auth::id())->get();
            // dd($orders);
            return view('store.history.index', compact('products', 'categories', 'cartItem', 'orders'));
        } else {
            $products = Product::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            return view('store.contact', compact('products', 'categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
    {
        if (Auth::id()) {
            $products = Product::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
            return view('store.history.show', compact('products', 'categories', 'cartItem', 'orders'));
        } else {
            $products = Product::all();
            $categories = Category::withCount('product')->get();
            $user = auth()->user();
            return view('store.contact', compact('products', 'categories'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
