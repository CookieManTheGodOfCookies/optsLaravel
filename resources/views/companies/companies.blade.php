@extends('layouts.master')

@section('content')
    <button class="btn btn-default" style="float: right" onclick="location.href='{{ url('add-company') }}'">
        <span class="glyphicon glyphicon-plus"></span> Add Company
    </button>
    @if(count($companies) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Info</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->info }}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="location.href='/companies/{{{ $company->id }}}'">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/companies/{{{ $company->id }}}/edit'">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else

    <h3>To add a company press "+"</h3>

    @endif
@endsection

@section('navbar')
    @include('partials.main_navbar')
@endsection