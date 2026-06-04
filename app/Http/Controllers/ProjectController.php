<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $projects = Project::paginate();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects/new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Guarda todos los datos del formulario en la base de datos
        Project::create($request->all());

        // 2. Redirige al usuario de vuelta a la pantalla de la tabla
        return redirect('projects')->with('success', 'Proyecto creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 1. Busca el proyecto en la base de datos por su ID
        $proyecto = Project::find($id);

        // 2. Abre una vista llamada 'update' y le manda los datos del proyecto
        return view('projects.update', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validamos los datos (nota que usamos 'nombre' y no 'titulo')
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required'
        ]);

        // 2. Buscamos el proyecto
        $proyecto = Project::find($id);

        // 3. Actualizamos los datos
        $proyecto->update($request->all());

        // 4. Redirigimos a la lista de proyectos con un mensaje
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 1. Buscamos el proyecto por su ID
        $proyecto = Project::find($id);

        // 2. Lo eliminamos de la base de datos
        $proyecto->delete();

        // 3. Redirigimos a la lista principal con un mensaje
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto eliminado satisfactoriamente.');
    }
}
