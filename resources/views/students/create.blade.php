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
                        <div class="card-header">Pridėkite studentą:</div>
                        <div class="card-body">
                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Vardas: </label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Pavardė: </label>
                                    <input type="text" name="surname" class="form-control">
                                </div>
                                <div class="form-group">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>El. paštas: </label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Tel. nr.: </label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Pridėti</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
