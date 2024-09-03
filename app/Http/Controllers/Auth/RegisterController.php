<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController
{
    public function handler($request){
        return match ($request->method()) {
            'GET' => $this->show($request),
            'POST' => $this->register( $request),
            default => abort(405, 'Method Not Allowed'),
        };
    }

    public function show(Request $request){
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('pertemuan3.auth.register');
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
        $roleId = Role::where('nama_role', 'User')->first()->id;
        if(!$roleId){
            throw new \RuntimeException('Role user not found');
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->role_id = $roleId;
        $user->save();
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
