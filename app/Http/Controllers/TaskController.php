<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.task_list', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.task_create');
    }

    public function store(Request $request){
        $request->validate([
            'task_title' => 'required',
            'task_des' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ],[
            'task_title.required' => 'The Task Title is required.',
            'task_des.required' => 'The Task Description is required.',
            'status.required' => 'The Task Status is required.',
            'due_date.required' => 'The Due Date is required.',
            'due_date.date' => 'The Due Date must be a valid date.',
        ]);

        Task::create([
            'task_title' => $request->task_title,
            'task_des' => $request->task_des,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        $notification = array(
            'message' => 'Task Creaded successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('tasks.index')->with($notification);

        // return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
}
