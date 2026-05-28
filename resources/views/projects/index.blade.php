<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Projetos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <h1>Gerenciador de Projetos</h1>

        <!-- Mensagens de sucesso e erro -->
        @include('projects.messages')
        
        <div class="card">
            <form action="{{ route('projects.store') }}" method="POST" class="form-vertical">
                @csrf
                
                <div class="form-row">
                    <input type="text" name="title" class="validated" placeholder="Título do projeto" required>
                    <input type="date" name="due_date" class="validated" required>
                    <input type="text" name="description" placeholder="Descrição (Opcional)">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

        @foreach($projects as $project)
            <div class="card">
                <div class="project-header">
                    <div>
                        <h3>{{ $project->title }}</h3>
                        <span class="due-date">Entrega: {{ date('d/m/Y', strtotime($project->due_date)) }}</span>
                    </div>
                    
                    <div class="task-actions">
                        <a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-outline">Editar</a>
                        <form action="{{ route('projects.destroy', ['id' => $project->id]) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </div>
                
                @if($project->description)
                    <p class="project-desc">{{ $project->description }}</p>
                @endif
            </div>
        @endforeach
    </div>

    
</body>
</html>