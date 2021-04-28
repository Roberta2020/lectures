@extends('layouts.app')
@section('content')
    {{-- Validation error --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {{-- Database error --}}
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    @if (auth()->check())
        @if (session('status_success'))
            <div class="alert alert-success" role="alert">{{ session('status_success') }}</div>
        @endif
        @if (session('status_error'))
            <div class="alert alert-danger" role="alert">{{ session('status_error') }}</div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Pakeiskite pažymio informaciją</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('grades.update', $grade->id) }}">
                                @csrf @method("PUT")
                                <div class="form-group">
                                    @error('student_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Studentas</label>
                                    <select name="student_id" id="" class="form-control">
                                        <option value="" selected disabled>Pasirinkite studentą</option>
                                        @foreach ($students as $student)
                                       <option value="{{ $student->id }}" @if($student->id == $grade->student_id) selected="selected" @endif>{{ $student->name . ' ' . $student->surname }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    @error('lecture_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Paskaita</label>
                                    <select name="lecture_id" id="" class="form-control">
                                        <option value="" selected disabled>Pasirinkite paskaitą</option>
                                        @foreach ($lectures as $lecture)
                                       <option value="{{ $lecture->id }}" @if($lecture->id == $grade->lecture_id) selected="selected" @endif>{{ $lecture->name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    @error('grade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Pažimys</label>
                                    <input type="number" name="grade" class="form-control" value="{{ $grade->grade }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Pakeisti</button>
                                <div class="form-group row" style="float: right; margin-right:2px;">
                                    <a href="/grades" class="btn btn-primary">Atgal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endsection
