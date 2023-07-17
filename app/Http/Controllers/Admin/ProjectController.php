<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $projects = Project::all();
        return view(('admin.projects.index'), compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $projects = Project::all();

        return view('admin.projects.create', compact("projects"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $data = $request->validated();

        $img_path = $data["image"]->store("uploads");
        // $img_path = Storage::put("uploads", $data["image"]);
        $data['image'] = $img_path;

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return to_route("admin.projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if (isset($data["image"])) {
            $img_path = $data["image"]->store("uploads");
            $data['image'] = $img_path;
        }
        // $img_path = $data["image"]->store("uploads");
        // $img_path = Storage::put("uploads", $data["image"]);
        // $data['image'] = $img_path;

        $project->fill($data);

        if (!isset($data["technologies"])) {
            $data["technologies"] = [];
        }
        $project->update();
        // dd($data);

        $project->technologies()->sync($data["technologies"]);




        return to_route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route("admin.projects.index");
    }
}
