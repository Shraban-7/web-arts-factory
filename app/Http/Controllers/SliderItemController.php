<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\SliderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = SliderItem::all();
        return json_encode($sliders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $carousels= Carousel::all();
        return view('admin.layouts.slider_item.create',compact('carousels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_title'=>'required',
            'item_bg_color'=>'required'
        ]);

        $imageName = '';
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/carousel/', $imageName);
        }

        SliderItem::create([
            'item_title'=>$request->item_title,
            'item_content'=>$request->item_content,
            'item_image'=>$imageName,
            'carousel_id'=>$request->carousel_id
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(SliderItem $sliderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SliderItem $sliderItem)
    {
        return json_encode($sliderItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SliderItem $sliderItem)
    {
        $imageName = '';
        $deleteOldImage = "uploads/images/carousel/{$sliderItem->item_image}";
        if ($image = $request->file('item_image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/carousel/', $imageName);
        } else {
            $imageName = $sliderItem->item_image;
        }

        $sliderItem->update([
            'item_title' => $request->item_title,
            'item_content' => $request->item_content,
            'item_image' => $imageName,
            'carousel_id' => $request->carousel_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SliderItem $sliderItem)
    {
        $sliderItem->delete();
    }
}
