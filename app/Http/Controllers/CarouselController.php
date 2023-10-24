<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels= Carousel::all();
        return view('admin.layouts.slider.list',compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Carousel::create($request->all());

        return redirect()->route('carousel.list')->with('success','Carousel store successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.layouts.slider.edit',compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $carousel->update($request->all());
        return redirect()->route('carousel.list')->with('success','Carousel update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
    }
}
