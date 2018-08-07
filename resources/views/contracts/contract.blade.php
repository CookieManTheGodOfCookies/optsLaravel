@extends('layouts.master')

@section('navbar')
    @include('partials.main_navbar')
@endsection

@section('content')
    <div class="col-md-4">
        <button type="button" class="btn btn-default" onclick="location.href='/companies/{{ $contract->company->id }}'">&lt; Back</button>
        {{-- Пихнуть кнопку удаления --}}
        <h4>Company: {{ $contract->company->name }}</h4>
        <h4>Info:</h4>
        <p>{{ $contract->company->info }}</p>
        <h4>Contract number: {{ $contract->number }}</h4>
    </div>
    <div class="col-md-8">
        @include('annexes.annexes')
    </div>
@endsection