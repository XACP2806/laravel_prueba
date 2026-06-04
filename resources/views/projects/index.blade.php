<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proyectos - Xavier Cardenas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4 shadow">
        <div class="container-fluid justify-content-center">
            <span class="navbar-brand mb-0 h1 fs-2">Xavier Cardenas</span>
        </div>
    </nav>

    <div class="container mt-4">
        
        <div class="text-center mb-4">
            <img src="{{ asset('portada.jpg') }}" class="img-fluid rounded shadow" alt="Banner de Proyectos" style="max-height: 250px; width: 100%; object-fit: cover;">
        </div>

        <h2 class="mb-4 text-primary fw-bold">Lista de Proyectos</h2>

        <a href="{{ route('projects.create') }}" class="btn btn-success mb-3 fw-bold shadow-sm">
            + Crear Nuevo Proyecto
        </a>

        <div class="card shadow border-0">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha creación</th>
                            <th scope="col" class="text-center">Editar</th>
                            <th scope="col" class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr class="align-middle">
                            <td class="text-center fw-bold">{{ $project->id }}</td>
                            <td>{{ $project->nombre }}</td>
                            <td>{{ $project->descripcion }}</td>
                            <td>{{ $project->created_at }}</td> 
                            
                            <td class="text-center">
                                <form action="{{ route('projects.edit', $project->id) }}" method="GET" class="m-0">
                                    <button type="submit" class="btn btn-warning btn-sm fw-bold shadow-sm">Editar</button>
                                </form>
                            </td>

                            <td class="text-center">
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm" onclick="return confirm('Xavier, ¿estás seguro de querer eliminar este proyecto?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
    </div>

</body>
</html>