<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        return view('dashboard.teacher.projects.project_index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competencies = Competency::all();
        $subjects     = Subject::all();
        return view('dashboard.teacher.projects.project_create', compact('competencies', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'                 => 'sometimes|nullable|mimes:jpeg,jpg,png|max:2000',
            'title'                 => 'required|max:200',
            'short_description'     => 'required|max:500',
            'long_description'      => 'required|max:5000',
            'deliverables'          => 'required|max:500',
        ]);
        if ($validator->fails()) {
            return redirect()->route('projects.create')
                ->with('warning', 'Some Errors in the form fields')
                ->withErrors($validator)
                ->withInput();
        }

        // Storing image in storage and setting the image's name in database
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('project/images', $file_name);
        } else {
            $file_name = "default-project.png";
        }
        $newProject = Project::create([
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
            'deliverables'          => $request->deliverables,
            'title'                 => $request->title,
            'start_date'            => $request->start_date . ' 00:00:00',
            'end_date'              => $request->end_date . ' 00:00:00',
            'resources'             => implode(',', $request->resources),
            'image'                 => $file_name,
        ]);

        foreach ($request->competencies as $competency) {
            $newProject->competencies()->attach($competency);
        }
        foreach ($request->subjects as $subject) {
            $newProject->subjects()->attach($subject);
        }
        return redirect()->route('projects.index')
            ->with('toast_success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('dashboard.teacher.projects.project_single', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return "edit project";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $project->subjects()->detach($project->id);
        DB::table('project_subject')->where('project_id', $project->id)->delete();
        $project->delete();

        return redirect(route('projects.index'))->with('success', 'Project deleted successfully.');
    }
}
