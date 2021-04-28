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
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>El. paštas</th>
            <th>Tel. nr.</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>
                <form action={{ route('student.destroy', $student->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('student.edit', $student->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Ištrinti"/>
                    <a href="{{ route('student.details', $student->id) }}" class="btn btn-primary m-1">Detaliau</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('student.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection