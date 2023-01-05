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
            $cont_A = 0;
            $cont_EP = 0;
            $cont_NE = 0;
            $sqs = Skill_Qual_Stud::all();
            foreach($sqs as $aux){
                switch ($aux->id_qual){
                    case 1:
                        $cont_A++;
                        break;
                    case 2:
                        $cont_EP++;
                        break;
                    case 3:
                        $cont_NE++;
                        break;
                    default:
                        break;
                }
            }

            return view('welcome',[
                'quals' => Qualification::all(),
                'classrooms' => Classroom::all(),
                'cont_A' => $cont_A,
                'cont_EP' => $cont_EP,
                'cont_NE' => $cont_NE,
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
            //dd($rein, $id_stud);
            if($rein){
                $date = $rein[0]->created_at;
                foreach($rein as $key => $value){
                    if($value->created_at == $date){
                        array_push($aux, $value);
                    }
                } 
            }
            //dd($aux, $rein, $date);
            
        }
        
        return view('home',[
            'student' => $student,
            //'quals' => $aux,
            'reinforcements' => $aux
        ]);
    }

}
