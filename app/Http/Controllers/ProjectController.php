<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')
                        ->latest()
                        ->get();
                        
        return view('projects.index', compact('projects'));
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index')->with('success', 'Projeto criado!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::find($id);
        
        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Projeto não encontrado!');
        }
        
        $project->load('tasks');
        return view('projects.edit', compact('project'));
    }

    public function update(StoreProjectRequest $request, $id)
    {
        $project = Project::find($id);
        
        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Projeto não encontrado!');
        }
        
        $project->update($request->validated());
        return back()->with('success', 'Projeto atualizado!');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        
        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Projeto não encontrado!');
        }
        
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projeto excluído!');
    }
}