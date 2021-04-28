<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', ['students' => Student::orderBy('surname')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'surname' => 'required|max:64',
            'email' => 'required|max:64',
            'phone' => 'required|max:32',
        ]);
        $student = new Student();
        $student->fill($request->all());
        return ($student->save() !== 1)
            ? redirect('/student')->with('status_success', 'Studentas pridėtas!')
            : redirect('/student')->with('status_error', 'Studentas negali būti pridėtas!');
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
        return view('students.edit', ['student' => $student]);
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
        $this->validate($request, [
            'name' => 'required|max:64',
            'surname' => 'required|max:64',
            'email' => 'required|max:64',
            'phone' => 'required|max:32',
        ]);
        $student->fill($request->all());
        return ($student->save() !== 1)
            ? redirect()->route('student.index')->with('status_success', 'Studentas paredaguotas!')
            : redirect()->route('student.index')->with('status_error', 'Studentas negali būti redaguotas!');
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
        return redirect('/student')->with('status_success', 'Studentas ištrintas!');
    }
    
    public function details($id){
        $student = Student::find($id);
        return view('students.details', ['student' => $student]);
    }
}
