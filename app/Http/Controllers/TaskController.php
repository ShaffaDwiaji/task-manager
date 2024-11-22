<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function main()
    {
        return view('main');
    }

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $request->validated();
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task tidak ditemukan');
        }
    
        return view('tasks.show', compact('task'));
    }
    

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->update();
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
