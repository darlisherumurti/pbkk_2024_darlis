<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController
{
    public function show(Request $request){
        if (Auth::check()) {
            return redirect()->back();
        }else{
            return view('pertemuan5.auth.register');
        }
    }

    public function register(Request $request)
    {
        $validated = $this->validator($request->all())->validate();
        $user = $this->create($validated);
        Auth::attempt($request->only('email', 'password'));
        return redirect()->intended('/');
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('pengunjung');
        return $user;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
