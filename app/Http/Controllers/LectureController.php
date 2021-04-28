<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lectures.index', ['lectures' => Lecture::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lectures.create');
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
            'description' => 'required',
        ]);
        $lecture = new Lecture();
        $lecture->fill($request->all());
        return ($lecture->save() !== 1)
            ? redirect('/lecture')->with('status_success', 'Paskaita pridėta!')
            : redirect('/lecture')->with('status_error', 'Paskaita negali būti pridėta!');
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('lectures.edit', ['lecture' => $lecture]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'description' => 'required',
        ]);
        $lecture->fill($request->all());
        return ($lecture->save() !== 1)
            ? redirect()->route('lecture.index')->with('status_success', 'Paskaita paredaguota!')
            : redirect()->route('lecture.index')->with('status_error', 'Paskaita negali būti redaguota!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect('/lecture')->with('status_success', 'Paskaita ištrinta!');    
    }
}
