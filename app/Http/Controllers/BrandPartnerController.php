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

     public function brands_api()
     {
        $brands= BrandPartner::all();
        return json_encode($brands);
     }



    public function index()
    {
        $brands= BrandPartner::all();
        return view('admin.layouts.brands.list',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.brands.create');
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
            $image->move('uploads/images/brand/', $imageName);
        }

        BrandPartner::create([
            'brand_name'=>$request->brand_name,
            'brand_logo'=>$imageName
        ]);

        return redirect()->route('brand.list')->with('success','brand store successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BrandPartner $brand)
    {
        return view('admin.layouts.brands.edit',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandPartner $brand)
    {
        return view('admin.layouts.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandPartner $brand)
    {

        // return $request->all();
        $imageName = '';
        $deleteOldImage = "uploads/images/brand/{$brand->brand_logo}";
        if ($image = $request->file('brand_logo')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/brand/', $imageName);
        } else {
            $imageName =$brand->brand_logo;
        }

        $brand->update([
            'brand_name'=>$request->brand_name,
            'brand_logo'=>$imageName
        ]);
        return redirect()->route('brand.list')->with('success','brand update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrandPartner $brand)
    {
        $brand->delete();
    }
}
