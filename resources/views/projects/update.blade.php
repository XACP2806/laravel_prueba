<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="fs-1 mb-4">Editar Proyecto</p>
                
                <form action="{{ route('projects.update', $proyecto->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Id</span>
                        <input type="text" name="id" class="form-control" value="{{ $proyecto->id }}" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Nombre</span>
                        <input type="text" name="nombre" class="form-control" value="{{ $proyecto->nombre }}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Descripción</span>
                        <textarea name="descripcion" class="form-control">{{ $proyecto->descripcion }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>