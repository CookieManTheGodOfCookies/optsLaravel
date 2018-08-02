@extends('layouts.master')

@section('navbar')
@include('partials.main_navbar')
@endsection

@section('content')
    <div class="col-md-6 offset-3" style="border: 1px solid lightgrey; border-radius: 1px">
        <form method="POST" action="/contracts">
            {{ csrf_field() }}
            <div class="form-group">
                <h3>Add a contract</h3>
            </div>
            <input type="hidden" name="company_id" value="{{ $company_id }}">
            <div class="form-group">
                <label for="numberInput">Contract number:</label>
                <input type="number" id="numberInput" class="form-control" name="number" placeholder="Input number here..." min="0" max="999999">
            </div>
            <div class="form-group">
                <label for="dateOfContractInput">Date of contract:</label>
                <input type="date" id="dateOfContractInput" class="form-control" name="dateOfContract">
            </div>
            <div class="form-group">
                <label for="expirationDateInput">Expiration date:</label>
                <input type="date" id="expirationDateInput" class="form-control" name="expirationDate">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='/companies/{{{ $company_id }}}'">Close</button>
            </div>
            <div class="form-group">
                @include('partials.errors')
            </div>
        </form>
    </div>
@endsection