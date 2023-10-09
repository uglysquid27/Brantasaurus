<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Carousel;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class screeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id()){
            $products = Product::select('*')->latest()->take(4)->get();
            $categories = Category::withCount('product')->get();
            $carousels = Carousel::select('*')->latest()->take(2)->get();
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->sum('quantity');
            $screening = Screening::all();
            return view('screening.index', compact('products', 'carousels', 'categories', 'cartItem', 'screening'));
        }else{
            $products = Product::select('*')->latest()->take(4)->get();
            $categories = Category::withCount('product')->get();
            $carousels = Carousel::select('*')->latest()->take(2)->get();
            $user = auth()->user();
            $screening = Screening::all();
            return view('screening.index', compact('products', 'carousels', 'categories', 'screening'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screening.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request ->validate([
            'namaLengkap' => 'required|max:255',
            'alamat' => 'required|max:255',
            'phone' => 'required|max:255',
            'nik' => 'required|max:255',
            'work' => 'required|max:255',
            'born' => 'required|max:255',
            'gender' => 'required|max:255',
            'batuk' => 'required|max:255',
            'bb' => 'required|max:255',
            'demam' => 'required|max:255',
            'lemas' => 'required|max:255',
            'keringat' => 'required|max:255',
            'sesak' => 'required|max:255',
            'getah' => 'required|max:255',
            'jangkit' => 'required|max:255',
            'lainnya'=> 'required',
        ]);

        Screening::create($validateData);
        return redirect('/screening/index')->with('success', 'Screening Succesful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Screening $category)
    {
        return view('screning.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Screening $category)
    {
        return view('screning.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screening $category)
    {
        $rules = [
            'namaLengkap' => 'required|max:255',
            'alamat' => 'required|max:255',
            'phone' => 'required|max:255',
            'nik' => 'required|max:255',
            'work' => 'required|max:255',
            'born' => 'required|max:255',
            'gender' => 'required|max:255',
            'batuk' => 'required|max:255',
            'bb' => 'required|max:255',
            'demam' => 'required|max:255',
            'lemas' => 'required|max:255',
            'keringat' => 'required|max:255',
            'sesak' => 'required|max:255',
            'getah' => 'required|max:255',
            'jangkit' => 'required|max:255',
            'lainnya'=> 'required',
        ];

        $validateData = $request->validate($rules);

        Screening::where('id', $category->id)
            ->update($validateData);
        return redirect('/screening/create')->with('success', 'Data Screening Succesfuly Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screening $category)
    {
        Screening::destroy($category->id);
        return redirect('/screening/create')->with('success', 'Data Screening Succesfuly Delete');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
