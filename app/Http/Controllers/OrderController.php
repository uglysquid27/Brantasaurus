<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
            $sizes = Cart::where('user_id', $user->id)->get();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            $orders = Order::where('user_id', $user->id)->where('status', '0')->orWhere('status', '1')->orWhere('status', '2')->get();
            // dd($orders);
            return view('store.order.index', compact('products', 'categories', 'cartItem', 'sizes', 'orders'));
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
            $cartItems = Cart::where('user_id', Auth::id())->get();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
            // dd($orders);
            return view('store.order.show', compact('products', 'categories', 'cartItem', 'cartItems', 'orders'));
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

    public function receive($id){
        $orders = Order::find($id);
        $orders->status = 3;
        $orders->update();
        return redirect('/my-orders')->with('status', "Order Status Updated");
    }

    public function print($id)
    {
        if (Auth::id()) {
            $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
            $data = [
                'orders' => $orders,
            ];
            $pdf = PDF::loadView('store.order.print', $data);
            return $pdf->stream('Order Details '. $orders->tracking_num .'.pdf');
        // return view('store.order.print', compact('orders'));
        } else {
            return view('store.index', compact('products', 'categories'));
        }
    }
}
