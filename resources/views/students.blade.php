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
            <td>{{ $student->id_number }}</td>
            <td>{{ $student->group }}</td>
            <td>
                @if($student->practice !== null)
                <h5>Company: <a href="/companies/{{ $student->practice->contract->company->id }}">{{ $student->practice->contract->company->name }}</a></h5>
                <h5>Contract: <a href="/contracts/{{ $student->practice->contract->id }}">{{ $student->practice->contract->number }}</a></h5>
                <h5>Annex: {{ $student->practice->number }}</h5>
                @else
                <h5>Not assigned</h5>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif

@endsection

@section('navbar')
@include('partials.main_navbar')
@endsection