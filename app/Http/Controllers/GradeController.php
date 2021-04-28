<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Lecture;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grades.index', ['grades' => Grade::all()]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('surname')->get();
        $lectures = Lecture::orderBy('name')->get();
        return view('grades.create', ['students' => $students], ['lectures' => $lectures]);    
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
            'student_id' => 'required',
            'lecture_id' => 'required',
            'grade' => 'required',
        ]);
        $grade = new Grade();
        $grade->fill($request->all());
        return ($grade->save() !== 1)
            ? redirect('/grades')->with('status_success', 'Pažymys pridėtas!')
            : redirect('/grades')->with('status_error', 'Pažymys negali būti pridėtas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $students = Student::orderBy('surname')->get();
        $lectures = Lecture::orderBy('name')->get();
        return view('grades.edit', ['grade' => $grade, 'students' => $students, 'lectures' => $lectures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'lecture_id' => 'required',
            'grade' => 'required',
        ]);
        $grade->fill($request->all());
        return ($grade->save() !== 1)
            ? redirect('/grades')->with('status_success', 'Pažymys paredaguotas!')
            : redirect('/grades')->with('status_error', 'Pažymys negali būti paredaguotas!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect('/grades')->with('status_success', 'Pažymys ištrintas!');   
    }
}
