<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Skill_Qual_Stud;
use App\Models\Skill_Rein_Stud;
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
        $id_user = Auth::user()->id_user;
        $student = Student::where('id_user',$id_user)->get();
        $quals = Skill_Qual_Stud::where('id_stud', $student[0]->id_stud)->get();
        //$rein = (Skill_Rein_Stud::where('id_stud', $student[0]->id_stud)->get()) ? Skill_Rein_Stud::where('id_stud',$student[0]->id_stud)->get() : '';
        $aux = [];

        if(Auth::user()->id_role == 3){
            foreach($quals as $key => $value){
                if($value->id_qual == 2) {
                    array_push($aux, $value);
                }
            }

            if(!empty($aux)){
                if(!empty($rein)){
                    foreach ($aux as $key => $value) {
                        dd($value);
                    }
                }

                
            }

            
        }
        return view('home',[
            'student' => $student,
            'quals' => $quals
        ]);
    }

}
