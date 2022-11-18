<?php

namespace App\Http\Controllers;

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
        //try {
            $classT = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
            $class = (count($classT) == 0) ? '3' : $classT[0]->id_class; 
            $skill_qual_stud = Skill_Qual_Stud::all();
            $students = Student::where('id_class', $class)->get();
            $skills = Skill::where('id_status', 1)->get();
            $count = $students->count() * $skills->count();
            return view('skill_qual_stud.index', [
                'skill_qual_stud' => $skill_qual_stud,
                'students' => $students,
                'skills' => $skills,
                'count' => $count,
            ]);
        // } catch (\Throwable $th) {
        //     return response()->json(['error' => $th], 400);
        // }
    }

    public function update(Request $request)
    {
        dd($request->all());
        if ($request->ajax()) {
            Skill_Qual_Stud::find($request->id)
                ->update([
                    $request->id_qual => $request->value
                ]);
  
            return response()->json(['success' => true]);
        }
    }
}
