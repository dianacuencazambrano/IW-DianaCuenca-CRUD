<?php

namespace App\Http\Controllers;

use App\Models\Reinforcement;
use App\Models\Skill;
use Illuminate\Http\Request;

class ReinforcementController extends Controller
{
    public function index()
    {
        try {
            return view('reinforcements.index', [
                'reinforcements' => Reinforcement::all(),
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function show($reinforcement)
    {
        try {
            $reinforcement = Reinforcement::find($reinforcement);
            if ($reinforcement->id_status == 1) {
                $action = "Disable";
            } else {
                $action = "Enable";
            }

            return view('reinforcements.show', [
                'reinforcement'  => $reinforcement,
                'action' => $action,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function create()
    {
        return view('reinforcements.create', [
            'skills' => Skill::where('id_status', 1)->get()
        ]);	
    }

    public function store(Request $request)
    {
        try {
            $rein = new Reinforcement();
            $rein->id_skill = $request->input('id_skill');
            $rein->title_rein = $request->input('title_rein');
            $rein->description_rein = $request->input('description_rein');
            $rein->save();

            return redirect()->route('reinforcements.index')->with(['success' => '¡¡Destreza Creada Exitosamente!!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function edit($reinforcement)
    {
        try {
            return view('reinforcements.edit',[
                'reinforcement' => Reinforcement::find($reinforcement),
                'skills' => Skill::where('id_status', 1)->get()
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $rein = Reinforcement::find($request->id);
            $rein->id_skill = $request->input('id_skill');
            $rein->title_rein = $request->input('title_rein');
            $rein->description_rein = $request->input('description_rein');
            $rein->save();

            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function changeStatus($rein)
    {
        try {
            $rein = Reinforcement::find($rein);
            if ($rein->id_status == '1') {
                $rein->id_status = '2';
                $rein->save();
            } else {
                $rein->id_status = '1';
                $rein->save();
            }
            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }
}
