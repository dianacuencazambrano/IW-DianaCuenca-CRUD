<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Role;
use App\Models\Skill;
use App\Models\Skill_Qual_Stud;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('id_role', 3)->get();
            return view('students.index', [
                'users' => $users
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function show($user)
    {
        try {
            $user = User::find($user);
            if ($user->id_status == 1) {
                $action = "Disable";
            } else {
                $action = "Enable";
            }

            return view('students.show', [
                'user'  => $user,
                'action' => $action,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function create()
    {
        $teacher = Teacher::where('id_user', Auth::user()->id_user)->get('id_class');
        return view('students.create', [
            'teacher' => $teacher,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->id_role = $request->input('id_role');
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->birthday = $request->input('birthday');
            $user->identification = $request->input('identification');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->homeAddress = $request->input('homeAddress');
            $user->email = $request->input('email');
            $user->password  = bcrypt($request->input('identification'));
            $user->save();

            $stud = new Student();
            $stud->id_user = $user->id_user;
            $stud->id_class = $request->input('id_class');
            $stud->save();

            $skills = Skill::where('id_status', 1)->get();
            foreach ($skills as $skill) {
                $scores = new Skill_Qual_Stud();
                $scores->id_stud = $stud->id_stud;
                $scores->id_skill = $skill->id_skill;
                $scores->id_qual = 3;
                $scores->save();
            }

            return redirect()->route('students.index')->with(['success' => '¡¡Usuario Creado Exitosamente!!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function edit($user)
    {
        try {
            $user = User::find($user);
            return view('students.edit', [
                'user' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->id_role = $request->input('id_role');
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->birthday = $request->input('birthday');
            $user->identification = $request->input('identification');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->homeAddress = $request->input('homeAddress');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('identification'));
            $user->save();

            $stud = Student::find($user->id);
            $stud->id_user = $user->id_user;
            $stud->id_class = $request->input('id_class');
            $stud->save();

            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function changeStatus($user)
    {
        try {
            $user = User::find($user);
            if ($user->id_status == '1') {
                $user->id_status = '2';
                $user->save();
            } else {
                $user->id_status = '1';
                $user->save();
            }
            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }
}
