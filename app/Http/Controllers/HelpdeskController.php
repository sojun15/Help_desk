<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    // protected $table = 'departments';

    public function StoreTask(Request $request)
    {
        $validation = $request->validate([
            'application_department' => 'required|string',
            'supported_task' => 'required|string|min:10'
        ]);

        $data = Department::create([
            'application_department' => $validation['application_department'],
            'supported_task' => $validation['supported_task'],
            'task_status' => 'panding',
            'user_id' => Auth::user()->user_id,
        ]);

        if($data){
            return redirect()->route('dashboard')->with('success','user signUp successfully');
        }

        return back()->with('error', 'Something went wrong');
    }
}
