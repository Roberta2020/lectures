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
                        <div class="card-header">Pakeiskime studento informaciją</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('student.update', $student->id) }}">
                                @csrf @method("PUT")
                                <div class="form-group">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Vardas</label>
                                    <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                                </div>
                                <div class="form-group">
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Pavardė</label>
                                    <input type="text" name="surname" class="form-control" value="{{ $student->surname }}">
                                </div>
                                <div class="form-group">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">El. paštas</label>
                                    <input type="text" name="email" class="form-control" value="{{ $student->email }}">
                                </div>
                                <div class="form-group">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Tel. nr.</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Pakeisti</button>
                                <div class="form-group row" style="float: right; margin-right:2px;">
                                    <a href="/student" class="btn btn-primary">Atgal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endsection
