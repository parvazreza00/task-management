<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function index(Request $request)
    {

        if ($request->filled('status')) {
            $tasks = Task::where('user_id', Auth::id())
                ->where('status', $request->status)
                ->orderBy('due_date', 'asc')
                ->get();
        } else {
            $tasks = Task::where('user_id', Auth::id())
                ->orderBy('due_date', 'asc')
                ->get();
        }

        return view('tasks.task_list', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.task_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_title' => 'required',
            'task_des' => 'required',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ], [
            'task_title.required' => 'The Task Title is required.',
            'task_des.required' => 'The Task Description is required.',
            'status.required' => 'The Task Status is required.',
            'due_date.required' => 'The Due Date is required.',
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
    }

    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.task_edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task_title' => 'required',
            'task_des' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ], [
            'task_title.required' => 'The Task Title is required.',
            'task_des.required' => 'The Task Description is required.',
            'status.required' => 'The Task Status is required.',
            'due_date.required' => 'The Due Date is required.',

        ]);

        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->update([
            'task_title' => $request->task_title,
            'task_des' => $request->task_des,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        $notification = array(
            'message' => 'Task Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('tasks.index')->with($notification);
    }

    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();

        $notification = array(
            'message' => 'Task Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('tasks.index')->with($notification);
    }

    //web route end----------------------------


    // api task start-------------------------
    public function showAllTasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function shwoSingleTask($id)
    {
        $task = Task::find($id);
        if ($task) {
            return response()->json($task);
        } else {
            return response()->json([
                'message' => 'Task not found',
            ]);
        }
    }

    public function storeApiTask(Request $request)
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'task_des' => 'required|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ]);

        $task = Task::create([
            'task_title' => $request->task_title,
            'task_des' => $request->task_des,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully.',
            'task' => $task,
        ], 201);
    }

    public function updateApiTask(Request $request, $id)
    {
        $task = Task::find($id);
        if(!$task){
            return response()->json([
                'success' => false,
                'message' => 'Task not found.',
            ]);
        }

        $task = Task::where('user_id', Auth::id())->find($id);
        if(!$task) {
            return response()->json([
                'success' => false,
                'message' => 'This is not your task.',
            ]);
        }        

        $task->update([
            'task_title' => $request->task_title,
            'task_des' => $request->task_des,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully.',
            'task' => $task,
        ]);
    }

    
    public function destroyApiTask($id)
    {
        $task = Task::find($id);
        if(!$task){
            return response()->json([
                'success' => false,
                'message' => 'Task not found.',
            ]);
        }

        $task = Task::where('user_id', Auth::id())->find($id);
        if(!$task) {
            return response()->json([
                'success' => false,
                'message' => "This is not your task, so you do not delete this.",
            ]);
        }

        $task->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully.',
        ]);
    }
    // api task end---------------------
}
