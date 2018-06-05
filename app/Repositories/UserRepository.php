<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name', $user->name);
        if (! User::where('email', $request->input('email'))->first()) {
            $user->email = $request->input('email', $user->email);
        }

        $user->password = empty($request->input('new_password')) ? $user->password
            : Hash::make($request->input('new_password'));

        return $user;
    }
}
