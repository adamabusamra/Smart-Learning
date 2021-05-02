<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('dashboard.admin.students.student_index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        require_once(__DIR__ . "/../../../public/assets/countries.php");
        $fields = Field::all();
        return view('dashboard.admin.students.student_create', compact('fields', 'countries'));
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
            'first_name'            => 'required|max:70',
            'last_name'             => 'required|max:70',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed|min:8',
            'address1'              => 'required|max:70',
            'address2'              => 'sometimes|nullable|max:255',
            'country'               => 'required|max:100',
            'city'                  => 'required|max:100',
            'field'                 => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->route('students.create')
                ->with('warning', 'Some Errors in the form fields')
                ->withErrors($validator)
                ->withInput();
        }

        // Storing image in storage and setting the image's name in database
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('student/images', $file_name);
        } else {
            $file_name = "default-avatar.png";
        }

        #The new way of storing requests even if not all the inputs are the same as the database
        // Modifiying our request to add our file name as image and speciality_id instaed of speciality
        $request->request->add(['image' => $file_name, 'field_id' => $request->field, 'password' => Hash::make($request->password)]);
        // Submitting the request but without the inputs that don't have a column in the database
        Student::create($request->except(['password_confirmation', 'field', 'speciality']));

        return redirect()->route('students.index')
            ->with('toast_success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        require_once(__DIR__ . "/../../../public/assets/countries.php");
        $fields = Field::all();
        return view('dashboard.admin.students.student_edit', compact('student', 'fields', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'first_name'            => 'required|max:70',
            'last_name'             => 'required|max:70',
            'email'                 => 'required|email',
            'password'              => 'sometimes|nullable|confirmed|min:8',
            'address1'              => 'required|max:70',
            'address2'              => 'sometimes|nullable|max:255',
            'country'               => 'required|max:100',
            'city'                  => 'required|max:100',
            'field'                 => 'required|integer',
            'image'                 => 'sometimes|nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('students.edit', $student->id)
                ->with('warning', 'Some Errors in the form fields')
                ->withErrors($validator)
                ->withInput();
        }

        // Storing image in storage and setting the image's name in database
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('student/images', $file_name);
        } else {
            $file_name = "default-avatar.png";
        }

        //Getting old password or replacing with new one if exists
        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $student->password;
        }

        $student->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => $password,
            'address1'      => $request->address1,
            'address2'      => $request->address2,
            'country'       => $request->country,
            'city'          => $request->city,
            'field_id'      => $request->field,
            'image'         => $file_name,
        ]);

        return redirect()->route('students.index')->with('toast_success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect(route('students.index'))->with('success', 'Student deleted successfully.');
    }
}
