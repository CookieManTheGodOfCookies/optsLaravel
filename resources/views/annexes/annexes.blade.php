<button type="button" class="btn btn-primary" onclick="location.href='/add-annex/{{{ $contract->id }}}'">
    <span class="glyphicon glyphicon-plus"></span> Add Annex
</button>
@if(count($annexes) > 0)
    <table class="table">
        <thead>
            <th>Annex Number</th>
            <th>Practice start</th>
            <th>Practice end</th>
            <th>Practice type</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($annexes as $annex)
                <tr>
                    <td>{{ $annex->number }}</td>
                    <td>{{ $annex->practice_start }}</td>
                    <td>{{ $annex->practice_end }}</td>
                    <td>{{ $practice_types[$annex->practice_type_id - 1]->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3> To add an annex press "+ Add Annex" </h3>
@endif