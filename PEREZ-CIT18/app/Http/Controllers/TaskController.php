<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create'); // Ensure you have a tasks.create blade file
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $task = Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'is_completed' => false,
    ]);

    // Debug and check if data is saved
    dd(Task::all()); // This will stop execution and dump all tasks

    return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
}


    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task')); // Ensure you have a tasks.edit blade file
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $task->update($request->all());

        return Redirect::route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}

}
