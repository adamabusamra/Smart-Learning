<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::all();
        return view('dashboard.admin.specialities.speciality_index', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Field::all();
        return view('dashboard.admin.specialities.speciality_create', compact('fields'));
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
            'field'         => 'required|integer'
        ]);

        Speciality::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'field_id'      => $request->field,
        ]);

        return redirect()->route('specialities.index')
            ->with('toast_success', 'Speciality created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        return $speciality;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        $fields = Field::all();
        return view('dashboard.admin.specialities.speciality_edit', compact('speciality', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([
            'name'          => 'required|max:70',
            'description'   => 'required|max:255',
            'field'         => 'required|integer'
        ]);

        $speciality->update([
            $speciality->name        = $request->name,
            $speciality->description = $request->description,
            $speciality->field_id       = $request->field,
        ]);

        return redirect(route('specialities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();

        return redirect(route('specialities.index'))->with('success', 'Speciality deleted successfully.');
    }
}
