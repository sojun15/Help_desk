<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function StoreTask(Request $request)
    {
        $validation = $request->validate([
            'application_department' => 'required|string',
            'supported_task' => 'required|string|min:10'
        ]);

        $data = Department::create([
            'application_department' => $validation['application_department'],
            'supported_task' => $validation['supported_task'],
            'task_status' => 'Panding',
            'user_id' => Auth::user()->user_id,
        ]);

        if($data){
            return redirect()->route('dashboard')->with('success','user signUp successfully');
        }

        return back()->with('error', 'Something went wrong');
    }


    public function dashboardPage()
    {
        $departments = Department::where('user_id',Auth::user()->user_id)->get();
        return view('dashboard', compact('departments'));
    }

    public function dashboardAdmin()
    {
        $departments = Department::all();
        return view('dashboard_admin', compact('departments'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'task_status' => 'required|string',
            'comments'    => 'required|string',
        ]);

        $department = Department::findOrFail($id);
        $department->task_status = $request->task_status;
        $department->comments = $request->comments;
        $department->save();

        return redirect()->back()->with('success', 'Task status updated successfully');
    }
}
