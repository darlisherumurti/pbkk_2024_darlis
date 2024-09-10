<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController
{
    public function __invoke(Request $request)
    {
        $validated = $this->validator($request->all())->validate();
        $user = $this->create($validated);
        $token = $user->createToken('api-token');
        return (new UserResource($user))->additional([
            'token' => $token->plainTextToken
        ]);
    }

    protected function create(array $data): User
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
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
}
