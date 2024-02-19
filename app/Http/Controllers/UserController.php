<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('user.edit', compact(['user']));
    }

    public function update($id, Request $request)
    {
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('/users');
    }
}