<?php

namespace App\Http\Controllers;

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
        return view('index');
    }
    public function shop()
    {
        return view('shop.index');
    }
    public function contact()
    {
        return view('contact');
    }
    public function detail()
    {
        return view('shop.detail');
    }
}
