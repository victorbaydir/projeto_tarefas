<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Projeto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        
        <div class="project-header" style="align-items: center; margin-bottom: 20px;">
            <h1>Editar: {{ $project->title }}</h1>

            <!-- Mensagens de sucesso e erro -->
            @include('projects.messages')

            <a href="{{ route('projects.index') }}" class="btn btn-outline">Voltar para Lista</a>
        </div>
        
        <div class="card">
            <h4>Detalhes do Projeto</h4>

            <form action="{{ route('projects.update', ['id' => $project->id]) }}" method="POST" class="form-vertical">
                @csrf 
                @method('PUT')

                <div class="form-row">
                    <input type="text" name="title" value="{{ $project->title }}" required>
                    <input type="date" name="due_date" value="{{ $project->due_date }}" required>
                    <input type="text" name="description" value="{{ $project->description }}">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

        <div class="card">
            <h4>Tarefas</h4>
            
            <form action="{{ route('tasks.store', ['id' => $project->id]) }}" method="POST" class="form-inline">
                @csrf
                
                <input type="text" name="description" class="validated" placeholder="Adicionar nova tarefa..." required>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>

            <ul class="task-list">
                @foreach($project->tasks as $task)
                    <li class="task-item">
                        <span class="task-name">
                            {{ $task->description }} 
                            <span class="badge {{ $task->status === 'concluída' ? 'badge-success' : 'badge-warning' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </span>
                        <div class="task-actions">
                            <form action="{{ route('tasks.updateStatus', ['id' => $task->id]) }}" method="POST">
                                @csrf @method('PUT')
                                <input type="hidden" name="status" value="{{ $task->status === 'pendente' ? 'concluída' : 'pendente' }}">
                                <button type="submit" class="btn btn-outline">Mudar Status</button>
                            </form>
                            <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">X</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</body>
</html>