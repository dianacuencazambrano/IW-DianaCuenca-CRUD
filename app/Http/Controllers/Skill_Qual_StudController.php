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
        try {
            $class = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
            $skill_qual_stud = Skill_Qual_Stud::all();
            $students = Student::where('id_class', $class);
            $skills = Skill::where('id_status', 1);
            $count = count($students) * count($skills);
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
}
