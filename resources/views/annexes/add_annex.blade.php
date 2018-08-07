@extends('layouts.master')

@section('navbar')
    @include('partials.main_navbar')
@endsection

@section('content')
    <div class="col-md-6 offset-3" style="border: 1px solid lightgrey; border-radius: 1px">
    <form method="POST" action="/annexes">
        {{ csrf_field() }}
        <div class="form-group">
            <h3>Add an annex</h3>
        </div>
        <div class="form-group">
            <label for="annexNumberInput">Annex number:</label>
            <input type="number" class="form-control" id="annexNumberInput" placeholder="Input number here..." name="number">
        </div>
        <div class="form-group">
            <label for="practiceStartInput">Practice starts at:</label>
            <input type="date" class="form-control" id="practiceStartInput" placeholder="Input date here..." name="practice_start"></input>
        </div>
        <div class="form-group">
            <label for="practiceEndInput">Practice ends at:</label>
            <input type="date" class="form-control" id="practiceEndInput" placeholder="Input date here..." name="practice_end"></input>
        </div>
        <div class="form-group">
            <label for="practiceTypeSelect">Practice type:</label>
            <select class="form-control" style="height: 35px;" id="practiceTypeSelect" name="practice_type">
                @foreach($practice_types as $ptype)
                    <option value="{{ $ptype->id }}">{{ $ptype->type }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="contract_id" value="{{ $contract->id }}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" onclick="location.href='/contracts/{{ $contract->id }}'">Close</button>
        </div>
        @include('partials.errors')
    </form>
</div>
@endsection