<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Pertemuan3Controller extends Controller
{
    //
    public function index(Request $request)
    {
        $data['user'] = request()->input('user');
        $data['users'] = User::all();
        return view('pertemuan3.autentikasi',compact('data'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'l-email' => 'required|email',
            'l-password' => 'required|string',
        ]);

        $user = User::where('email', $request->input('l-email'))->first();

        if ($user && Hash::check($request->input('l-password'), $user->password)) {
            $request->session()->put('user_id', $user->id);
            return redirect()->route('pertemuan3.index')->with('success', 'Login sukses');
        }

        return back()->withErrors([
            'l-email' => 'The provided credentials do not match our records.',
            'l-password' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'r-name' => 'required|string|max:255',
            'r-email' => 'required|string|email|max:255|unique:users',
            'r-password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->input('r-name'),
            'email' => $request->input('r-email'),
            'password' => Hash::make($request->input('r-password')),
        ]);

        return redirect()->route('pertemuan3.index')->with('success', 'Akun sukses dibuat');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect()->route('pertemuan3.index')->with('success', 'Logout sukses');
    }
}
