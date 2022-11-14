<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        try {
            return view('users.index', [
                'users' => User::all(),
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

            return view('users.show', [
                'user'  => $user,
                'action' => $action,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::get(),
            'classes' => Classroom::get(),
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
            $user->password  = bcrypt($request->input('password'));
            $user->save();

            if($user->id_role == 2){
                $teach = new Teacher();
                $teach->id_user = $user->id_user;
                $teach->id_class = $request->input('id_class');
                $teach->save();
            }elseif($user->id_role == 3){
                $stud = new Student();
                $stud->id_user = $user->id_user;
                $stud->id_class = $request->input('id_class');
                $stud->save();
            }

            return redirect()->route('users.index')->with(['success' => '¡¡Usuario Creado Exitosamente!!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function edit($user)
    {
        try {
            $user = User::find($user);
            dd($user->role);
            return view('users.edit',[
                'user' => $user,
                'roles' => Role::get(),
                'classes' => Classroom::get(),
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
            $user->password  = bcrypt($request->input('password'));
            $user->save();

            if($user->id_role == 2){
                $teach = Teacher::find($user->id);
                $teach->id_user = $user->id_user;
                $teach->id_class = $request->input('id_class');
                $teach->save();
            }elseif($user->id_role == 3){
                $stud = Student::find($user->id);
                $stud->id_user = $user->id_user;
                $stud->id_class = $request->input('id_class');
                $stud->save();
            }

            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function changeStatus($user)
    {
        try {
            $user = User::find($user);
            if ($user->status == 1) {
                $user->status = 2;
                $user->save();
            } else {
                $user->status = 1;
                $user->save();
            }
            return $this->index();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }
}
