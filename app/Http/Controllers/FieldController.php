<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::all();
        return view('dashboard.admin.fields.field_index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.fields.field_create');
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
            'image'         => 'sometimes|nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        // Storing image in storage and setting the image's name in database
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('field/images', $file_name);
        } else {
            $file_name = "default-field.png";
        }

        Field::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $file_name,
        ]);

        return redirect()->route('fields.index')
            ->with('toast_success', 'Field created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        return $field;
    }
    public function field_specialities(Field $field)
    {
        return $field->specialities;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        return view('dashboard.admin.fields.field_edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $request->validate([
            'name'          => 'required|max:70',
            'description'   => 'required|max:255',
            'image'         => 'sometimes|nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        //Getting old image or replacing with new one if exists
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('field/images', $file_name);
            $image = $file_name;
        } else {
            $image = $field->image;
        }

        $field->update([
            $field->name        = $request->name,
            $field->description = $request->description,
            $field->image       = $image,
        ]);

        return redirect(route('fields.index'))->with('toast_success', 'Field updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        $field->delete();

        return redirect(route('fields.index'))->with('success', 'Field deleted successfully.');
    }
}
