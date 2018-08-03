@extends('layouts.master')

@section('navbar')

    @include('partials.main_navbar')

@endsection

@section('content')
    <div class="col-md-6 offset-3" style="border: 1px solid lightgrey; border-radius: 1px">
    <form method="POST" action="/contracts/">
        {{ csrf_field() }}
        <div class="form-group">
            <h3>Edit contract</h3>
        </div>
        <div class="form-group">
            <label for="numberInput">Contract number:</label>
            <input type="number" class="form-control" id="numberInput" placeholder="Input number here..." name="number" value="{{ $contract->number }}">
        </div>
        <div class="form-group">
            <label for="dateOfContractInput">Date of Contract:</label>
            <input type="date" class="form-control" id="dateOfContractInput" placeholder="Input date here..." name="date_of_contract" value="{{ $contract->date_of_contract }}">
        </div>
        <div class="form-group">
            <label for="expirationDateInput">Expiration date:</label>
            <input type="date" class="form-control" id="expirationDateInput" placeholder="Input date here..." name="expiration_date" value="{{ $contract->expiration_date }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='/companies/{{ $contract->company->id }}'">Close</button>
        </div>
        <div class="form-group">
            @include('partials.errors')
        </div>
    </form>
</div>
@endsection