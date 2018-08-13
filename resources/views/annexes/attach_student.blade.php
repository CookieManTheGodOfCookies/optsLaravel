@extends('layouts.master')

@section('navbar')
@include('partials.main_navbar')
@endsection

@section('content')
<table class="table">
    <thead>
        <th>Name</th>
        <th>Surname</th>
        <th>ID</th>
        <th></th>
    </thead>
    <tbody>
        @if(count($students) > 0)
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->id_number }}</td>
            <td>
                <form method="POST" action="/annexes/{{ $annex->id }}/attach">
                    {{ csrf_field() }}
                    <input type="hidden" name="student_id" value={{ $student->id }}>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus"></span> Attach
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <h3>There are no students to attach...</h3>
        @endif
    </tbody>
</table>
@endsection