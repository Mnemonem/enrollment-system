<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //shows the registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    //Handles the Register Logic (POST)
    public function register(Request $request)
    {       //validate method
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|unique:users', //icheck niya ug naa na ang email sa user
            'password' => 'required|min.8|confirmed', //check and confirm for the password field
        ]);
        //DATABASE --USER--
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function login(Request $request)
    {
        //Handles the Login Logic (POST)
        $request->validate([
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ])
        ]);


        //mag-attempt ug login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); //Security measure
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match',
        ]);

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regeneratetoken();
        return redirect()->route('login');

    }


}