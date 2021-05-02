<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencies = Competency::all();
        return view('dashboard.teacher.competencies.competency_index', compact('competencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teacher.competencies.competency_create');
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
        ]);
        Competency::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'field_id'      => auth()->user()->speciality->field_id
        ]);

        return redirect()->route('competencies.index')
            ->with('toast_success', 'Competency created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function show(Competency $competency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function edit(Competency $competency)
    {
        return view('dashboard.teacher.competencies.competency_edit', compact('competency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency)
    {
        $request->validate([
            'name'          => 'required|max:70',
            'description'   => 'required|max:255',
        ]);
        $competency->update([
            'name'        => $request->name,
            'description' => $request->description,

        ]);

        return redirect(route('competencies.index'))->with('toast_success', 'Competency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency)
    {
        $competency->delete();

        return redirect(route('competencies.index'))->with('success', 'Competency deleted successfully.');
    }
}
