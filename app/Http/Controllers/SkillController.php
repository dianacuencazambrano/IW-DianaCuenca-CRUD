<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        try {
            return view('skills.index', [
                'skills' => Skill::all(),
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function show($skill)
    {
        try {
            $skill = Skill::find($skill);
            if ($skill->id_status == 1) {
                $action = "Disable";
            } else {
                $action = "Enable";
            }

            return view('skills.show', [
                'skill'  => $skill,
                'action' => $action,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        try {
            $skill = new skill();
            $skill->title_skill = $request->input('title_skill');
            $skill->description_skill = $request->input('description_skill');
            $skill->save();

            return redirect()->route('skills.index')->with(['success' => '¡¡Destreza Creada Exitosamente!!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function edit($skill)
    {
        try {
            return view('skills.edit',[
                'skill' => Skill::find($skill),
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $skill = Skill::find($request->id);
            $skill->title_skill = $request->input('title_skill');
            $skill->description_skill = $request->input('description_skill');
            $skill->save();

            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function changeStatus($skill)
    {
        try {
            $skill = Skill::find($skill);
            if ($skill->id_status == 1) {
                $skill->id_status = 2;
                $skill->save();
            } else {
                $skill->id_status = 1;
                $skill->save();
            }
            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }


}
