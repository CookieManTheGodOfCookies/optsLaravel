@if(count($contracts) > 0)
<button type="button" class="btn btn-primary" onclick="location.href='/add-contract/{{{ $company->id }}}'">
    <span class="glyphicon glyphicon-plus"></span> Add Contract
</button>
<table class="table">
    <thead>
        <tr>
            <th>Contract number</th>
            <th>Date  Of Contract</th>
            <th>Expiration date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($contracts as $contract)
        <tr>
        <td>{{ $contract->number }}</td>
        <td>{{ $contract->date_of_contract }}</td>
        <td>{{ $contract->expiration_date }}</td>
        <td>
            <button type="button" class="btn btn-primary" onclick="location.href='/contracts/{{ $contract->id }}/edit'">
                <span class="glyphicon glyphicon-pencil">
            </button>
        </td>
        <tr>
        @endforeach
    </tbody>
</table>
@else
    <h3> To add a contract press "+ Add Contract" </h3>
@endif