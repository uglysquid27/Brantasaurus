<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
            'slug' => 'required|unique:categories',
            'name' => 'required|max:255',
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

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('category');
        }

        Category::create($validateData);
        return redirect('/dashboard/category')->with('success', 'New Category Succesful Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
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
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' =>'image|file|max:1024',
            'desc' => 'required',
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('category');
        }

        Category::where('id', $category->id)
            ->update($validateData);
        return redirect('/dashboard/category')->with('success', 'Category Succesful Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete($category->image);
        }
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', 'Category Succesful Delete');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
