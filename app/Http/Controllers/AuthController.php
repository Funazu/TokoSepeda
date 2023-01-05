<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }


    public function register(Request $request) {
        return view('auth.register');
    }

    public function postRegister(Request $request) {

        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'name' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'buyer';
        
        User::create($validatedData);
        return redirect('/login');
    }
}

