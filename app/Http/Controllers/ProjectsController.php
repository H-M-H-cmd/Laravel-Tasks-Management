<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::all()]);
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'projectName' => 'required|unique:projects,name'
        ]);

        $project = new Project();
        $project->name = $request->projectName;

        $project->save();
        $request->session()->flash('primary', 'project created successfully');
        return redirect('/projects');
    }
    public function destroy(Project $project)
    {
        $checkTask = $project->tasks()->count();
        if ($checkTask > 0) {
            session()->flash('danger', 'Can\'t delete that project cause it have tasks');
            return redirect('/projects');
        }
        $project->delete();
        session()->flash('warning', 'project deleted succsesfully');
        return redirect('/projects');
        // dd($project->tasks()->get()->count());
    }
}
