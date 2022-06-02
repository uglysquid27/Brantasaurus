<?php

namespace App\Http\Controllers;

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
        return view('store.index');
    }
    public function shop()
    {
        return view('store.shop.index');
    }
    public function contact()
    {
        return view('store.contact');
    }
    public function detail()
    {
        return view('store.shop.detail');
    }
}
