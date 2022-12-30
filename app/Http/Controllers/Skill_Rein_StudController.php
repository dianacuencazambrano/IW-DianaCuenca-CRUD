<?php

namespace App\Http\Controllers;

use App\Models\Reinforcement;
use App\Models\Skill;
use App\Models\Skill_Qual_Stud;
use App\Models\Skill_Rein_Stud;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Skill_Rein_StudController extends Controller
{
    public function publishReinforcements(){
        try {
            $classT = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
            $class = (count($classT) == 0) ? '3' : $classT[0]->id_class;
            $skill_qual_stud = Skill_Qual_Stud::all();
            $skill_rein_stud = (Skill_Rein_Stud::all()) ? Skill_Rein_Stud::all() : [];
            $students = (Auth()->user()->id_role == 1) ? Student::all() : Student::where('id_class', $class)->get();//corregir la clase
            $skills = Skill::where('id_status', 1)->get();
            $reinf = Reinforcement::where('id_status', 1)->get();
            $aux = [];
            $aux2 = [];
            $auxRein = [];
            $auxQual = [];
            $object = [];
            
            if(Auth()->user()->id_role != 1){
                foreach($students as $stud){
                    foreach($skill_qual_stud as $sqs){
                        if($stud->id_stud == $sqs->id_stud){
                            array_push($aux, $sqs); //get studens qualifications and 
                            array_push($aux2, $stud);
                        }
                    }
                }
                
                // if($aux){
                //     dd($aux);
                //     foreach($aux as $skill_qual_stud){
                //         if($skill_qual_stud->id_qual == 2){
                //             foreach($reinf as $rein){
                //                 if($rein->id_skill == $skill_qual_stud->id_skill){
                //                     //array_push($auxRein, $rein);
                //                     $r = Reinforcement::where('id_status', 1)->where('id_skill', $rein->id_skill)->get();
                //                     foreach($r as $key => $value){
                //                         array_push($auxRein, $value);
                //                     }
                //                     $index = array_rand($auxRein, 1);//get random reinforcement from skill
                //                     //dd($auxRein);
                //                     $srs = new Skill_Rein_Stud();
                //                     $srs->id_stud = $skill_qual_stud->id_stud;
                //                     $srs->id_skill = $auxRein[$index]->id_skill;
                //                     $srs->id_rein = $auxRein[$index]->id_rein;
                //                     $srs->save();
                //                 }
                //             }
                //         }
                //     }
                // }

                if($aux){
                    foreach($aux as $skill_qual_stud){
                        if($skill_qual_stud->id_qual == 2){
                            array_push($auxQual, $skill_qual_stud);
                        }
                    }
                }
                //dd($auxQual);
                $id_skill = '';
                $index = 0;

                if ($auxQual) {
                    foreach ($auxQual as $skill_qual_stud) {
                        $id_skill = $skill_qual_stud->id_skill;
                        $r = Reinforcement::where('id_status', 1)->where('id_skill', $id_skill)->get();
                        //dd($r);
                        foreach ($r as $key => $value) {
                            array_push($auxRein, $value);
                        }

                        $index = array_rand($auxRein, 1);
                        $srs = new Skill_Rein_Stud();
                        $srs->id_stud = $skill_qual_stud->id_stud;
                        $srs->id_skill = $auxRein[$index]->id_skill;
                        $srs->id_rein = $auxRein[$index]->id_rein;
                        array_push($object, $srs);
                        $srs->save();
                    }
                }

                /*if ($auxQual) {
                    foreach($reinf as $rein){
                        foreach ($auxQual as $skill_qual_stud) {
                            
                                //array_push($auxRein, $rein);
                                $sturein = Skill_Rein_Stud::where('id_skill', $skill_qual_stud->id_skill)->where('id_stud', $skill_qual_stud->id_stud)->get();
                                
                                    $r = Reinforcement::where('id_status', 1)->where('id_skill', $rein->id_skill)->get();
                                    foreach ($r as $key => $value) {
                                        array_push($auxRein, $value);
                                    }
                                //if (!$sturein) {
                                    $index = array_rand($auxRein, 1); //get random reinforcement from skill
                                    //dd($auxRein);
                                    if ($rein->id_skill == $skill_qual_stud->id_skill) {
                                    $srs = new Skill_Rein_Stud();
                                    $srs->id_stud = $skill_qual_stud->id_stud;
                                    $srs->id_skill = $auxRein[$index]->id_skill;
                                    $srs->id_rein = $auxRein[$index]->id_rein;
                                    array_push($object, $srs);
                                    //$srs->save();
                                //}
                            }
                        }
                    }
                }*/
            }
            //dd($object);
            return 'success';
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /*public function publishReinforcements(){
        try {
            $classT = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
            $class = (count($classT) == 0) ? '3' : $classT[0]->id_class;
            $skill_qual_stud = Skill_Qual_Stud::all();
            $skill_rein_stud = (Skill_Rein_Stud::all()) ? Skill_Rein_Stud::all() : [];
            $students = (Auth()->user()->id_role == 1) ? Student::where('id_status', 1)->get() : Student::where('id_class', $class)->get();
            $skills = Skill::where('id_status', 1)->get();
            $reinf = Reinforcement::where('id_status', 1)->get();
            $aux = [];
            $aux2 = [];
            $auxRein = [];
            $auxCont = [];
            
            if(Auth()->user()->id_role != 1){
                foreach($students as $stud){
                    foreach($skill_qual_stud as $sqs){
                        if($stud->id_stud == $sqs->id_stud){
                            array_push($aux, $sqs); //get studens qualifications and 
                            array_push($aux2, $stud);
                        }
                    }
                }
                
                if($aux){
                    foreach($aux as $skill_qual_stud){
                        if($skill_qual_stud->id_qual == 2){
                            foreach($reinf as $rein){
                                if($rein->id_skill == $skill_qual_stud->id_skill){
                                    $r = Reinforcement::where('id_status', 1)->where('id_skill', $rein->id_skill)->get();
                                    
                                    foreach($r as $key => $rei){
                                        array_push($auxRein, $rei);
                                    }
                                    
                                    
                                    //dd($inde, $r[$inde]);
                                    //dd($auxCont, $index, $r[$index]->id_rein);
                                    //if(isset($r[$inde])){
                                        $srs = new Skill_Rein_Stud();
                                        $inde = array_rand($auxRein, 1);
                                        $srs->id_stud = $skill_qual_stud->id_stud;
                                        $srs->id_skill = $skill_qual_stud->id_skill;
                                        $srs->id_rein = $r[$inde]->id_rein;
                                        //dd($r, $srs);
                                        $srs->save();
                                    //}
                                }
                            }
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    } */



}
/* to search
// if($skill_rein_stud){
//     foreach($skill_rein_stud as $skillReinStud){
//         if($skillReinStud->id_stud == $skill_qual_stud->id_stud){
//             if($skillReinStud->id_skill )
//             array_push($auxStud, )
//         }
//     }// 
// }else {

// }


public function publishReinforcements(){
        try {
            $classT = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
            $class = (count($classT) == 0) ? '3' : $classT[0]->id_class;
            $skill_qual_stud = Skill_Qual_Stud::all();
            $skill_rein_stud = (Skill_Rein_Stud::all()) ? Skill_Rein_Stud::all() : [];
            $students = (Auth()->user()->id_role == 1) ? Student::where('id_status', 1)->get() : Student::where('id_class', $class)->get();
            $skills = Skill::where('id_status', 1)->get();
            $reinf = Reinforcement::where('id_status', 1)->get();
            $aux = [];
            $aux2 = [];
            $auxRein = [];
            $auxCont = [];
            
            if(Auth()->user()->id_role != 1){
                foreach($students as $stud){
                    foreach($skill_qual_stud as $sqs){
                        if($stud->id_stud == $sqs->id_stud){
                            array_push($aux, $sqs); //get studens qualifications and 
                            array_push($aux2, $stud);
                        }
                    }
                }
                
                if($aux){
                    foreach($aux as $skill_qual_stud){
                        if($skill_qual_stud->id_qual == 2){
                            foreach($reinf as $rein){
                                if($rein->id_skill == $skill_qual_stud->id_skill){
                                    $r = Reinforcement::where('id_status', 1)->where('id_skill', $rein->id_skill)->get();
                                    
                                    foreach($r as $key => $rei){
                                        array_push($auxRein, $rei);
                                    }
                                    
                                    $inde = array_rand($auxRein, 1);
                                    //dd($inde, $r[$inde]);
                                    //dd($auxCont, $index, $r[$index]->id_rein);
                                    if(isset($r[$inde])){
                                        $srs = new Skill_Rein_Stud();
                                        $srs->id_stud = $skill_qual_stud->id_stud;
                                        $srs->id_skill = $skill_qual_stud->id_skill;
                                        $srs->id_rein = $r[$inde]->id_rein;
                                        //dd($r, $srs);
                                        $srs->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }



*/