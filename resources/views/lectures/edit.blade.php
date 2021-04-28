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
                        <div class="card-header">Pakeiskime paskaitos informaciją</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('lecture.update', $lecture->id) }}">
                                @csrf @method("PUT")
                                <div class="form-group">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Pavadinimas</label>
                                    <input type="text" name="name" class="form-control" value="{{ $lecture->name }}">
                                </div>
                                <div class="form-group">
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Aprašymas</label>
                                    <textarea id="mce" type="text" name="description" rows=10 cols=100
                                        class="form-control">{{ $lecture->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Pakeisti</button>
                                <div class="form-group row" style="float: right; margin-right:2px;">
                                    <a href="/lecture" class="btn btn-primary">Atgal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endsection
