<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        try{
            return view('welcome',[
                'quals' => Qualification::all(),
                'classrooms' => Classroom::all()
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function home(){
        $students = Student::all();

        if(Auth::user()->id_role == 2)

        return view('home',[
            'students' => $students
        ]);
    }

}
