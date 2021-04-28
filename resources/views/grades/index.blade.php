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
            <th>Studentas</th>
            <th>Paskaita</th>
            <th>Pažymys</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($grades as $grade)
        <tr>
            <td>{{ $grade->student->name . ' ' . $grade->student->surname }}</td>
            <td>{{ $grade->lecture['name'] }}</td>
            <td>{{ $grade->grade }}</td>
            <td>
                <form action={{ route('grades.destroy', $grade->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('grades.edit', $grade->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Ištrinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('grades.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection