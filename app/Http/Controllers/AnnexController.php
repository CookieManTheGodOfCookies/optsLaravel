<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contract;
use App\Annex;
use App\Student;

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

    public function attachStudentView(Annex $annex) {
        $students = Student::whereNull('annex_id')->get();
        return view('annexes.attach_student', compact('annex', 'students'));
    }

    public function attachStudent(Request $request, Annex $annex) {
        $student = Student::find(request('student_id'));
        $annex->student_id = request('student_id');
        $student->annex_id = $annex->id;
        $annex->save();
        $student->save();
        return redirect('/contracts/' . $annex->contract->id);
    }

    public function detach(Annex $annex) {
        // dd($annex);
        $annex->student->annex_id = null;
        $annex->student_id = null;
        $annex->student->save();
        $annex->save();
        return redirect()->back();
    }

    public function delete(Annex $annex) {
        $annex->delete();
        return redirect()->back();
    }
}
