<?php

namespace App\Http\Controllers;

use App\Models\ServiceFeature;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceFeatures = ServiceFeature::all();
        return json_encode($serviceFeatures);
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
        return response()->json(['success' => true], 201);
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
        return json_encode($serviceFeature);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceFeature $serviceFeature)
    {
        $serviceFeature->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceFeature $serviceFeature)
    {
        $serviceFeature->delete();
    }
}
