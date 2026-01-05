<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function storeData(Request $request){
        $validation = $request -> validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|confirmed|string'
        ]);

        $data = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => Hash::make($validation['password']),
            'role' => 'student'
        ]);
        if($data){
            return redirect()->route('login')->with('success','user signUp successfully');
        }

        return back()->with('error', 'Something went wrong');
    }

    public function loginUser(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password',
    ]);
    }

    public function dashboardPage()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        else 
        {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
