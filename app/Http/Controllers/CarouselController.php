<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('dashboard.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.carousel.create');
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
            'promo' => 'required|max:255',
            'slug' => 'required|unique:carousels',
            'desc' => 'required',
            'image' =>'mimes:jpg,jpeg,png,mp4,mkv|file',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('carousel');
        }

        Carousel::create($validateData);
        return redirect('/dashboard/carousel')->with('success', 'New Carousel Succesful Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        return view('dashboard.carousel.show', [
            'carousel' => $carousel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('dashboard.carousel.edit', [
            'carousel' => $carousel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        $rules = [
            'promo' => 'required|max:255',
            'image' =>'image|file|max:10240',
            'desc' => 'required',
        ];

        if ($request->slug != $carousel->slug) {
            $rules['slug'] = 'required|unique:carousels';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('carousel');
        }

        Carousel::where('id', $carousel->id)
            ->update($validateData);
        return redirect('/dashboard/carousel')->with('success', 'Carousel Succesful Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        if ($carousel->image) {
            Storage::delete($carousel->image);
        }
        Carousel::destroy($carousel->id);
        return redirect('/dashboard/carousel')->with('success', 'Carousel Succesful Delete');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Carousel::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
