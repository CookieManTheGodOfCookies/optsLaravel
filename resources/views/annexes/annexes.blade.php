<button type="button" class="btn btn-primary" onclick="location.href='/add-annex/{{{ $contract->id }}}'">
    <span class="glyphicon glyphicon-plus"></span> Add Annex
</button>
<button type="button" class="btn btn-danger" onclick="location.href='/contracts/{{ $contract->id }}/delete'">
    <span class="glyphicon glyphicon-remove"></span> Delete contract
</button>
@if(count($annexes) > 0)
    <table class="table">
        <thead>
            <th>Annex Number</th>
            <th>Practice start</th>
            <th>Practice end</th>
            <th>Practice type</th>
            <th>Student</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($annexes as $annex)
                <tr>
                    <td>{{ $annex->number }}</td>
                    <td>{{ $annex->practice_start }}</td>
                    <td>{{ $annex->practice_end }}</td>
                    <td>{{ $practice_types[$annex->practice_type_id - 1]->type }}</td>
                    <td>
                        @if($annex->student === null)
                            <button type="button" class="btn btn-success" onclick="location.href='/annexes/{{{ $annex->id }}}/attach_choose'">
                                <span class="glyphicon glyphicon-plus"></span> Attach
                            </button>
                        @else
                            {{  $annex->student->surname}} {{ $annex->student->id_number }}
                            <button type="button" class="btn btn-secondary" onclick="location.href='/annexes/{{{ $annex->id }}}/detach'">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='/annexes/{{ $annex->id }}/edit'">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="location.href='/annexes/{{ $annex->id }}/delete'">    
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3> To add an annex press "+ Add Annex" </h3>
@endif