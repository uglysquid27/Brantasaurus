<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.product.create', compact('categories', 'tags'));
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
            'category_id' =>'required',
            'product_name' => 'required|max:255',
            'slug' => 'required|unique:products',
            'quantity' => 'required',
            'price' => 'required',
            'sell_price' => 'required',
            'description' => 'required',
            'image' =>'image|file|max:1024',
            'tag' =>'required',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('Product');
        }

        $validateData['small_description'] = Str::limit(strip_tags($request->description), 200);

        Product::create($validateData)->tag()->attach($request->tag);
        return redirect('/dashboard/product')->with('success', 'New Product Succesful Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $tags = Tag::all();
        $product_tag = $product->tag;
        $diff = $tags->diff($product_tag);
        return view('dashboard.product.edit', compact('diff', 'tags'), [
            'product' => $product,
            'categories' => Category::all(),   
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'category_id' => 'required',
            'product_name' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'sell_price' => 'required',
            'description' => 'required',
            'image' =>'image|file|max:1024',
        ];

        if ($request->slug != $product->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $validateData = $request->validate($rules);

        $validateData['small_description'] = Str::limit(strip_tags($request->description), 200);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('Product');
        }
        
        Product::where('id', $product->id)
            ->update($validateData);
        $product->tag()->sync($request->tag);
        return redirect('/dashboard/product')->with('success', 'Product Succesful Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('/dashboard/product')->with('success', 'Product Succesful Delete');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Product::class, 'slug', $request->product_name);
        return response()->json(['slug' => $slug]);
    }
}
