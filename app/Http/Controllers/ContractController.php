<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contract;

class ContractController extends Controller
{
    public function addForm(Company $company) {
        $company_id = $company->id;
        return view('contracts.add_contract', compact('company_id'));
    }

    public function editForm(Contract $contract) {
        return view('contracts.edit_contract', compact('contract'));
    }

    public function store(Request $request) {
        $request->validate([
            'number' => 'required|unique:contracts|min:0|max:999999',
            'dateOfContract' => 'required|date',
            'expirationDate' => 'required|date|after:dateOfContract',
        ]);

        $contract = new Contract;
        $contract->number = request('number');
        $contract->date_of_contract = request('dateOfContract');
        $contract->expiration_date = request('expirationDate');
        $contract->company_id = $request->company_id;

        $contract->save();

        return redirect('/companies/' . $request->company_id);
    }

    //TODO : update для контракта
}
