<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function service_api_list()
    {
        // $services = Service::with('technologies');
        $services = Service::all();

        return json_encode($services);

    }


    public function index()
    {
        // $services = Service::with('technologies');
        $services = Service::all();

        return view('admin.layouts.services.services',compact('services'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();

        // return "hi";

        return view('admin.layouts.services.create', compact('technologies'));
    }
    // public function create()
    // {
    //     $technologies = Technology::all();

    //     return view('test', compact('technologies'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name'=>'required',
            'service_logo' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng'
        ]);
        $imageName = '';
        if ($image = $request->file('service_logo')) {
            $imageName = uniqid() . '.' . $image->getClientOriginalName();
            $image->move('uploads/images/service', $imageName);
        }
        $status=0;
        if($request->status)
        {
            $status=1;
        }

        // return $request->all();

        $service=Service::create([
            'service_name'=>$request->service_name,
            'service_slug'=>Str::slug($request->service_name),
            'service_logo'=>$imageName,
            'service_desc'=>$request->service_desc,
            'service_process'=>$request->service_process,
            'service_benefits'=>$request->service_benefits,
            'service_duration'=>$request->service_duration,
            'meta_title'=>$request->meta_title,
            'meta_tag'=>$request->meta_tag,
            'meta_desc'=>$request->meta_desc,
            'status'=>$status
        ]);


        if ($request->has('technologies')) {
            $service->technologies()->attach($request->technologies);
        }

        return redirect()->route('services')->with('success','service store successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show_user(Service $service)
    {
        return json_encode($service);
    }

    public function show(Service $service)
    {
        return view('admin.layouts.services.details',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $selectedTechnologyIds = $service->technologies->pluck('id')->toArray();
        $technologies = Technology::all();
        return view('admin.layouts.services.edit',compact('technologies','service', 'selectedTechnologyIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        // return request()->all();
        $imageName = '';
        $deleteOldImage = "uploads/images/service/{$service->service_logo}";
        if ($image = $request->file('service_logo')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/service/', $imageName);
        } else {
            $imageName = $service->service_logo;
        }

        $status=0;
        if($request->status)
        {
            $status=1;
        }


        $service->update([
            'service_name'=>$request->service_name,
            'service_slug'=>Str::slug($request->service_name),
            'service_logo'=>$imageName,
            'service_desc'=>$request->service_desc,
            'service_process'=>$request->service_process,
            'service_benefits'=>$request->service_benefits,
            'service_duration'=>$request->service_duration,
            'meta_title'=>$request->meta_title,
            'meta_tag'=>$request->meta_tag,
            'meta_desc'=>$request->meta_desc,
            'status'=>$status
        ]);

        if ($request->has('technologies')) {
            $service->technologies()->sync($request->input('technologies'));
        } else {
            // If technologies are not provided, you may want to detach any existing relationships.
            $service->technologies()->detach();
        }

        return redirect()->route('services')->with('success','service update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $deleteOldImage = "public/services/images/{$service->service_logo}";

        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        $service->delete();

        return response()->json(['success' => 'service delete successfully '], 201);
    }
}
