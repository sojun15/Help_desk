<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

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
            'password' => $validation['password']
        ]);
        if($data){
            return redirect()->route('login')->with('success','user signUp successfully');
        }
    }

    public function loginUser(Request $request){
        $validation = $request-> validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($validation)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'user login successful');
        }
        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
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

    public function applicationData(Request $request){
        $validation = $request -> validate([
            'phone' => 'required|string',
            'name' => 'required|string',
            'password' => 'required',
            'hsc_id' => 'required|integer',
            'ssc_id' => 'required|integer',
        ]);

        // $data = Application::create([
        //     'Full_name' => $validation['name'],
        //     'phone' => $validation['phone'],
        //     'hsc_id' => $validation['hsc_id'],
        //     'ssc_id' => $validation['ssc_id'],
        //     'password' => bcrypt($validation['password'])
        // ]);

        // if($data){
        //     return redirect()->route('dashboard')->with('success','User login successfull');
        // }
    }
}
