<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        try{
            return view('welcome',[
                'quals' => Qualification::all()
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }
}
