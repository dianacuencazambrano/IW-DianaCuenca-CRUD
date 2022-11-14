<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Qualification;
use Illuminate\Http\Request;

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
        return view('home');
    }

}
