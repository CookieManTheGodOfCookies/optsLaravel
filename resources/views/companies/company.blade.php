@extends('layouts.master')

@section('navbar')
@include('partials.main_navbar')
@endsection

@section('content')
<div class="col-md-4">
    <button type="button" class="btn btn-default" onclick="location.href='/companies'">&lt; Back</button>
    {{-- TODO: // пихнуть сюда кнопку удаления, добавить алерт на удаление и разобраться со связанными контрактами, приложениями и т.д. НО! это уже после полного функционала с прикреплением студентов / приложениями и т.п --}}
    <h4>Company: {{ $company->name }}</h4>
    <h4>Info:</h4>
    <p>{{ $company->info }}</p>
</div>
<div class="col-md-8">
    @include('contracts.contracts')
</div>
@endsection