@extends('layouts.master')

@section('content')
<div class="col-md-6 offset-3" style="border: 1px solid lightgrey; border-radius: 1px">
    <form method="POST" action="/companies">
        {{ csrf_field() }}
        <div class="form-group">
            <h3>Add a company</h3>
        </div>
        <div class="form-group">
            <label for="companyNameInput">Company name:</label>
            <input type="text" class="form-control" id="companyNameInput" placeholder="Input name here..." name="name">
        </div>
        <div class="form-group">
            <label for="companyInfoInput">Contact information:</label>
            <textarea class="form-control" id="companyInfoInput" placeholder="Input info here..." style="height: 200px" name="info"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" onclick="location.href='/companies'">Close</button>
        </div>
        @include('partials.errors')
    </form>
</div>
@endsection

@section('navbar')
@include('partials.main_navbar')
@endsection