<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contract;
use App\Annex;
use Illuminate\Support\Facades\DB;

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

    public function update(Request $request, Contract $contract) {
        $request->validate([
            'number' => 'required|unique:contracts,id,'. $contract->id . '|min:0|max:999999',
            'date_of_contract' => 'required|date',
            'expiration_date' => 'required|date|after:date_of_contract',
        ]);

        if((int) $request->number !== (int) $contract->number) {
            if(Contract::where('number', '=', $request->number)->first() !== null)
                return redirect()->back()->withErrors('This number has already been taken!');
            else
                $contract->update([
                    'number' => request('number'),
                    'date_of_contract' => request('date_of_contract'),
                    'expiration_date' => request('expiration_date'),
                ]);
        }
        else
            $contract->update([
                'date_of_contract' => request('date_of_contract'),
                'expiration_date' => request('expiration_date'), // сложновато 
            ]);
        return redirect('/companies/' . $contract->company->id);
    }

    public function show(Contract $contract) {
        $annexes = $contract->annexes;
        $practice_types = DB::table('practice_types')->get();
        return view('contracts.contract', compact('contract', 'annexes', 'practice_types'));
    }

    public function delete(Contract $contract) {
        $company_id = $contract->company->id;
        foreach ($contract->annexes as $annex) {
            $annex->delete();
        }
        $contract->delete();
        return redirect('/companies/' . $company_id);
    }
}
