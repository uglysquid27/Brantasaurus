<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderAdminController extends Controller
{
    public function index(){
        $orders = Order::where('status', '0')->get();
        return view('dashboard.orders.index', compact('orders'));
    }
}
