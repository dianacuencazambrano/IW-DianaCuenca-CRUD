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
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function show($user)
    {
        $user = User::find($user);
        if($user->status == 1){
            $action = "Disable";
        }else{
            $action = "Enable";
        }
            
        return view('users.show', [
            'user'  => $user,
            'action' => $action,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        //return $this->index();
        return redirect()->route('users.index')->with(['success' => '¡¡Usuario Creado Exitosamente!!']);
    }

    public function edit($user)
    {
        $user = User::find($user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();
        
        return $this->index();
    }

    public function changeStatus($user)
    {
        $user = User::find($user);
        if($user->status == 1)
        {
            $user->status = 0;
            $user->save();
        }else
        {
            $user->status = 1;
            $user->save();
        }
        return $this->index();
    }
}
