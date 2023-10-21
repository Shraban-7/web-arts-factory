<?php

namespace App\Http\Controllers;

use App\Models\BrandPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = '';
        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/brand/images/', $imageName);
        }

        BrandPartner::create([
            'brand_name'=>$request->brand_name,
            'brand_logo'=>$imageName
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BrandPartner $brandPartner)
    {
        return json_encode($brandPartner);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandPartner $brandPartner)
    {
        return json_encode($brandPartner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandPartner $brandPartner)
    {
        $imageName = '';
        $deleteOldImage = "public/brand/images/{$brandPartner->brand_logo}";
        if ($image = $request->file('brand_logo')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/brand/images/', $imageName);
        } else {
            $imageName =$brandPartner->brand_logo;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrandPartner $brandPartner)
    {
        $brandPartner->delete();
    }
}
