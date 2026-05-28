<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, $projectId)
    {
        $request->validate(
            [
                'description' => 'required|string'
            ]
        );
        
        $project = Project::find($projectId);

        $project->tasks()->create([
            'description' => $request->description,
            'status' => 'pendente'
        ]);

        return back()->with('success', 'Tarefa adicionada!');
    }

    public function updateStatus(Request $request, $taskId)
    {
        $request->validate(
            [
                'status' => 'required|in:pendente,concluída'
            ]
        );
        
        $task = Task::find($taskId);
        
        $task->update(
            [
                'status' => $request->status
            ]
        );
        
        return back()->with('success', 'Status atualizado!');
    }

    public function destroy($taskId)
    {
        $task = Task::find($taskId);

        if (!$task) {
            return redirect()->route('projects.index')->with('error', 'Task não encontrada!');
        }
        
        $task->delete();
        return back()->with('success', 'Tarefa excluída!');
    }
}