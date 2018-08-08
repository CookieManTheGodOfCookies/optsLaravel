<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contract;
use App\Annex;

class AnnexController extends Controller
{
    public function addForm(Contract $contract) {
        $practice_types = DB::table('practice_types')->get();
        // dd($practice_types);
        return view('annexes.add_annex', compact('contract', 'practice_types'));
    }

    public function store(Request $request) {
        $request->validate([
            'number' => 'required|min:0|max:999999|unique:annexes',
            'practice_start' => 'date|required',
            'practice_end' => 'date|after:practice_start|required',
        ]);

        $annex = new Annex;
        $annex->number = request('number');
        $annex->practice_start = request('practice_start');
        $annex->practice_end = request('practice_end');
        $annex->contract_id = request('contract_id');
        $annex->practice_type_id = request('practice_type'); 
        $annex->save();

        return redirect('/contracts/' . request('contract_id'));
    }

    public function update(Request $request, Annex $annex) {
        $request->validate([
            'number' => 'required|unique:annexes,number,'. $annex->id .'|min:0|max:999999',
            'practice_start' => 'required|date',
            'practice_end' => 'required|date|after:practice_start',
        ]);

        $annex->number = request('number');
        $annex->practice_start = request('practice_start');
        $annex->practice_end = request('practice_end');
        $annex->practice_type_id = request('practice_type_id');
        $annex->save();

        return redirect('/contracts/' . $annex->contract->id);
    }

    public function editForm(Annex $annex) {
        $practice_types = DB::table('practice_types')->get();
        return view('annexes.edit_annex', compact('annex', 'practice_types'));
    }
}
