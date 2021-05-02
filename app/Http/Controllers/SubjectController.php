<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('dashboard.teacher.subjects.subject_index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        return view('dashboard.teacher.subjects.subject_create', compact('specialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:70',
            'description'   => 'required|max:255',
            'speciality'    => 'required|integer',
            'image'         => 'sometimes|nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        // Storing image in storage and setting the image's name in database
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('subject/images', $file_name);
        } else {
            $file_name = "default-subject.png";
        }

        Subject::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'speciality_id' => $request->speciality,
            'image'         => $file_name,
        ]);

        return redirect()->route('subjects.index')
            ->with('toast_success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $specialities = Speciality::all();
        return view('dashboard.teacher.subjects.subject_edit', compact('subject', 'specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name'          => 'required|max:70',
            'description'   => 'required|max:255',
            'speciality'    => 'required|integer',
            'image'         => 'sometimes|nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        //Getting old image or replacing with new one if exists
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('subject/images', $file_name);
            $image = $file_name;
        } else {
            $image = $subject->image;
        }

        $subject->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'speciality_id' => $request->speciality,
            'image'         => $image,
        ]);

        return redirect(route('subjects.index'))->with('toast_success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect(route('subjects.index'))->with('success', 'Subject deleted successfully.');
    }
}
