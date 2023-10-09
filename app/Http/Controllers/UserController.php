<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function authMethod($authData)
    {
        $authData['password'] = md5($authData['password']);
        // dd($authData);

        $user = DB::table('users')
            ->where('email', $authData['email'])
            ->where('password', $authData['password'])
            ->first();

        session([
            'id' => $user->id,
            'username' => $user->name, 
            'user_email' => $user->email, 
            'user_rights' => $user->role_id
        ]);
    }
    public function sign_in(Request $request)
    {
        $authData = $request->all();

        $validated = $request->validate([
            'email' => 'required|min:8|max:24',
            'password' => 'required|min:6|max:24'
        ]);

        $this->authMethod($validated);
        return redirect('/');
    }

    public function sign_up(Request $request)
    {
        $regData = $request->all();

        $validated = $request->validate([
            'name' => 'required|min:2|max:16',
            'email' => 'required|min:8|max:24|unique:users',
            'password' => 'required|min:6|max:24'
        ]);

        if ($validated['password'] == $regData['password_repeat']) {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => md5($validated['password'])
            ]);

            $this->authMethod($validated);
            return redirect('/');
        }
    }
}
