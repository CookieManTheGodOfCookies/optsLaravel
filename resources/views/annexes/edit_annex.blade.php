@extends('layouts.master')

@section('navbar')
    @include('partials.main_navbar')
@endsection

@section('content')
    <div class="col-md-6 offset-3" style="border: 1px solid lightgrey; border-radius: 1px">
        <form method="POST" action="/annexes/{{ $annex->id }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="annexNumberInput">Annex number:</label>
                <input type="number" class="form-control" placeholder="Input number here..." value="{{ $annex->number }}" name="number"></input>
            </div>
            <div class="form-group">
                <label for="practiceStartInput">Practice starts at: </label>
                <input type="date" class="form-control" name="practice_start" placeholder="Input date here..." value="{{ $annex->practice_start }}">
            </div>
            <div class="form-group">
                <label for="practiceEndInput">Practice ends at: </label>
                <input type="date" name="practice_end" class="form-control" placeholder="Input date here..." value="{{ $annex->practice_end }}">
            </div>
            <div class="form-group">
                <label for="practiceTypeSelect">Practice type: </label>
                <select class="form-control" style="height: 35px;">
                    @foreach($practice_types as $practice_type)
                        @if($practice_type->id === $annex->practice_type_id)
                            <option value="{{ $practice_type->id }}" selected>{{ $practice_type->type }}</option>
                        @else
                            <option value="{{ $practice_type->id }}">{{ $practice_type->type }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @include('partials.errors')
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='/contracts/{{ $annex->contract->id }}'">Close</button>
            </div>
        </form>
    </div>
@endsection