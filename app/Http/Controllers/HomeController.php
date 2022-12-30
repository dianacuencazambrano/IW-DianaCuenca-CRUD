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

    // public function home(){
    //     $id_user = Auth::user()->id_user;
    //     $student = [];
    //     $quals = [];
    //     $rein = [];	
    //     $aux = [];

    //     if(Auth::user()->id_role == 3){
    //         $student = Student::where('id_user',$id_user)->get();
    //         $quals = Skill_Qual_Stud::where('id_stud', $student[0]->id_stud)->get();
    //         $rein = Skill_Rein_Stud::where('id_stud', $student[0]->id_stud)->get();
    //         //dd($rein);
            
    //         foreach($quals as $key => $value){
    //             if($value->id_qual == 2) {
    //                 array_push($aux, $value);
    //             }
    //         }

    //         if(!empty($aux)){
    //             if(empty($rein)){
    //                 foreach ($aux as $key => $value) {
    //                     dd($value);
    //                 }
    //             }
    //         }            
    //     }
    //     //dd($aux);
        
    //     return view('home',[
    //         'student' => $student,
    //         //'quals' => $aux,
    //         'reinforcements' => $rein
    //     ]);
    // }

    public function home(){
        $id_user = Auth::user()->id_user;
        $student = [];
        $quals = [];
        $rein = [];	
        $aux = [];

        if(Auth::user()->id_role == 3){
            $student = Student::where('id_user',$id_user)->get();
            $id_stud = $student[0]->id_stud;
            $rein = Skill_Rein_Stud::where('id_stud', $id_stud)->orderBy('created_at', 'DESC')->get();
            //dd($rein);
            if($rein){
                //$date = $rein[0]->created_at;
                foreach($rein as $key => $value){
                    if($value->created_at == $rein[0]->created_at){
                        array_push($aux, $value);
                    }
                } 
            }
            dd($aux, $rein);
            
        }
        
        return view('home',[
            'student' => $student,
            //'quals' => $aux,
            'reinforcements' => $aux
        ]);
    }

}
