<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', ['tasks' => $tasks, "projects" => Project::all()]);
    }
    public function create()
    {
        return view('tasks.create', ["projects" => Project::all()]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'taskName' => 'required'
        ]);

        $task = new Task();
        $task->name = $request->taskName;
        $task->project_id = $request->projectId;
        $task->priority = Task::count() + 1;

        $task->save();
        $request->session()->flash('primary', 'task created successfully');
        return redirect('/tasks');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'taskName' => 'required',
        ]);
        $task->name = $request->taskName;
        $task->save();
        $request->session()->flash('success', 'task updated succsesfully');
        return redirect('/tasks');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        session()->flash('warning', 'task deleted succsesfully');
        return redirect('/tasks');
    }
    public function filter(Request $request, Project $project)
    {
        $tasks = $project->find($request->projectId)->tasks()->orderBy('priority')->get();
        return view('tasks.index', ['tasks' => $tasks, "projects" => Project::all(), "selected" => $request->projectId]);
    }
}
