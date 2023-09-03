<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50|string|unique:projects',
            'content' => 'required|string',
            'image' => 'url:http,https|nullable',
        ], [
            'title.required' => 'Title is required',
            'title.max' => 'Title max length is 50',
            'title.unique' => 'the title already exists',

            'content.required' => 'Description is required',

            'image.url' => 'Url is not valid',
        ]);
        $data = $request->all();

        $project = new Project();

        $project->fill($data);

        $project->slug = Str::slug($project->title, '-');

        $project->save();
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'max:50', 'string', Rule::unique('projects')->ignore($project)],
            'content' => 'required|string',
            'image' => 'url:http,https|nullable',
        ], [
            'title.required' => 'Title is required',
            'title.max' => 'Title max length is 50',
            'title.unique' => 'the title already exists',

            'content.required' => 'Description is required',

            'image.url' => 'Url is not valid',
        ]);

        $data = $request->all();

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
