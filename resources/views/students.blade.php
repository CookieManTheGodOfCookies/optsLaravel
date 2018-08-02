@extends('layouts.master')

@section('content')

@if(count($students) > 0)

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Patronymic</th>
                <th scope="col">Student ID</th>
                <th scope="col">Group</th>
                <th scope="col">Practice</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surname }}</td>
                    <td>{{ $student->patronymic }}</td>
                    <td>{{ $student->idNumber }}</td>
                    <td>{{ $student->group }}</td>
                    <td>TODO:// Place practice here</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endif

@endsection

@section('navbar')
    @include('partials.main_navbar')
@endsection