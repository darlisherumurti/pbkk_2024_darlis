<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function show(){
        return view('pertemuan3.login');
    }

    public function login(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store the user ID in the session
            $request->session()->put('user_id', $user->id);

            return redirect()->route('dashboard')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Clear the session
        $request->session()->forget('user_id');

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
