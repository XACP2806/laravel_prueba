<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Lista de Proyectos</h2>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th> </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->nombre }}</td>
                            <td>{{ $project->descripcion }}</td>
                            <td>{{ $project->created_at }}</td> 
                            
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <a href="{{ route('projects.create') }}" class="btn btn-primary mt-3">Crear Nuevo Proyecto</a>
    </div>

</body>
</html>