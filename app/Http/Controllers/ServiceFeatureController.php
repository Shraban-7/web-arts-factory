<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceFeature;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceFeatures = ServiceFeature::with('service')->get();
        return view('admin.layouts.service_feature.list',compact('serviceFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.layouts.service_feature.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'feature_title'=>'required',
            'feature_desc'=>'required',
            'service_id'=>'required',
        ]);

        ServiceFeature::create(
            [
                'feature_title'=>$request->feature_title,
                'feature_desc'=>$request->feature_desc,
                'service_id'=>$request->service_id,
            ]
        );
        return redirect()->route('service.feature.list')->with('success','service feature create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceFeature $serviceFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceFeature $serviceFeature)
    {
        $services=Service::all();
        return view('admin.layouts.service_feature.edit',compact('serviceFeature','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceFeature $serviceFeature)
    {
        $serviceFeature->update($request->all());

        return redirect()->route('service.feature.list')->with('success','service feature update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceFeature $serviceFeature)
    {
        $serviceFeature->delete();
    }
}
