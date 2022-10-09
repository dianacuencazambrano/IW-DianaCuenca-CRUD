<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::get();
            return view('users.index', [
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
            if ($user->status == 1) {
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
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->birthday = $request->input('birthday');
            $user->identification = $request->input('identification');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->homeAddress = $request->input('homeAddress');
            $user->email = $request->input('email');
            $user->password  = bcrypt($request->input('password'));
            $user->save();
            return redirect()->route('users.index')->with(['success' => '¡¡Usuario Creado Exitosamente!!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function edit($user)
    {
        try {
            $user = User::find($user);
            return view('users.edit', compact('user'));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->save();
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
                $user->status = 0;
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
