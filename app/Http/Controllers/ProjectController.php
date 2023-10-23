<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function project_list_api()
    {
        $projects = Project::all();
        return json_encode($projects);
    }

    public function index()
    {
        $projects = Project::with('service')->get();
        // return $projects;
        return view('admin.layouts.projects.list',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.layouts.projects.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request->all();

        $request->validate([
            'project_title'=>'required',
            'project_desc'=>'required',
            'project_service_id'=>'required'
        ]);

        $imageName='';

        if ($request->hasFile('project_banner')) {
            $image = $request->file('project_banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/projects/', $imageName);
        }

        Project::create([
            'project_title'=>$request->project_title,
            'project_banner'=>$imageName,
            'project_desc'=>$request->project_desc,
            'project_url'=>$request->project_url,
            'project_service_id'=>$request->project_service_id
        ]);

        return redirect()->route('service.project.list')->with('success','project create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $services=Service::all();
        return view('admin.layouts.projects.edit',compact('project','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $imageName = '';
        $deleteOldImage = "uploads/images/projects/{$project->project_banner}";
        if ($image = $request->file('project_banner')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/projects/', $imageName);
        } else {
            $imageName = $project->project_banner;
        }

        $project->update([
            'project_title'=>$request->project_title,
            'project_banner'=>$imageName,
            'project_desc'=>$request->project_desc,
            'project_url'=>$request->project_url,
            'project_service_id'=>$request->project_service_id
        ]);

        return redirect()->route('service.project.list')->with('success','project update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
    }
}
