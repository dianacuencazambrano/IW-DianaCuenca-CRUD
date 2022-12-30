<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use App\Models\Skill;
use App\Models\Skill_Qual_Stud;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Skill_Qual_StudController extends Controller
{
    public function index()
    {
        try {
            $classT = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
            $class = (count($classT) == 0) ? '3' : $classT[0]->id_class; 
            $skill_qual_stud = Skill_Qual_Stud::all();
            $students = (Auth()->user()->id_role == 1) ? Student::all() : Student::where('id_class', $class)->get();
            $skills = Skill::where('id_status', 1)->get();
            $count = $students->count() * $skills->count();
            return view('skill_qual_stud.index', [
                'skill_qual_stud' => $skill_qual_stud,
                'students' => $students,
                'skills' => $skills,
                'count' => $count,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            //$qual = Qualification::where('scale_qual', $request->value)->get('id_qual');
            //dd($qual);
            if($request->value == 'A'){
                $id = 1;
            }else if($request->value == 'EP'){
                $id = 2;
            }else{
                $id = 3;
            }
            
            Skill_Qual_Stud::find($request->pk)
                ->update([
                    $request->name => $id
                ]);
  
            return response()->json(['success' => true]);
        }
    }
}
