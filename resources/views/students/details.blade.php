@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Studento pažymiai</div>
    <div class="card-body">
        <h5>Studentas: {{ $student->name }} {{$student->surname}}</h5>
        <h5>El. paštas: {{ $student->email }}</h5>
        <h5>Telefonas: {{ $student->phone }}</h5>
        <hr>
        @foreach ($student->grades as $grade)
            <div class="row">
                <div class="col-sm-6">{{$grade->lecture->name}}</div>
                <div class="col-sm-6">{{$grade->grade}}</div>
            </div>
        @endforeach
        <div class="form-group row" style="float: right; margin-right:2px;">
            <a href="/student" class="btn btn-primary">Atgal</a>
        </div>
    </div>
</div>
@endsection