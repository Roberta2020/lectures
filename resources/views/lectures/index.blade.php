@extends('layouts.app')
@section('content')
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
<div class="card-body"> 
    <table class="table">
        <tr>
            <th>Paskaitos pavadinimas</th>
            <th>Aprašymas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($lectures as $lecture)
        <tr>
            <td>{{ $lecture->name }}</td>
            <td>{!! $lecture->description !!}</td>
            <td>
                <form action={{ route('lecture.destroy', $lecture->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('lecture.edit', $lecture->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Ištrinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('lecture.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection