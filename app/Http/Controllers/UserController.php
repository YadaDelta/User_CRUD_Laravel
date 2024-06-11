<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        User::create($incomingFields);
        return redirect('/');
    }

    public function showEdit(User $user) {
        return view('edit-user', ['user' => $user]);
    }

    public function updateUser(User $user, Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user->update($incomingFields);
        return redirect('/');
    }

    public function deleteUser(User $user) {
        $user->delete();
        return redirect('/');
    }
}
