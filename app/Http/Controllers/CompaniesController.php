<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contract;

class CompaniesController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view('companies.companies', compact('companies'));
    }

    public function addForm() {
        return view('companies.add_company');
    }

    public function editForm(Company $company) {
        return view('companies.edit_company', compact('company'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:companies|min:2|max:255',
            'info' => 'required|min:3|max:255'
        ]);

        Company::create([
            'name' => request('name'),
            'info' => request('info'),
        ]);

        return redirect('/companies');
    }

    public function show(Company $company) {
        $contracts = Contract::where('company_id', '=', $company->id)->get();

        return view('companies.company', compact('company', 'contracts'));
    }

    public function update(Request $request, Company $company) {
        $request->validate([
            'name' => 'required|min:2|max:255|unique:companies,id,' . $company->id,
            'info' => 'required|min:3|max:255',
        ]);

        if($request->name !== $company->name) {
            $c = Company::where('name', '=', request('name'))->first();
            if($c !== null) {
                // dd($request->name);
                // TODO: разобраться, как вернуть старое имя в поле, если оно занято
                return redirect()->back()->with('lastname', $request->name)->withErrors('This name has already been taken!');
            }
            else {
                $company->update([
                    'name' => request('name'),
                    'info' => request('info'),
                ]);
            }
        }
        return redirect('/companies');
    }
}
