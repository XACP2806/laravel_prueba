<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model // (O "class proyectos extends Model" según tu archivo)
{
    use HasFactory;

    // $fillable: evitamos asignación masiva (por seguridad).
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // método boot: mientras se esté creando un nuevo proyecto, guardamos el usuario identificado en ese momento.
    protected static function boot()
    {
        parent::boot();
        
        // APAGAMOS ESTO TEMPORALMENTE:
        // static::creating(function ($project) {
        //     $project->user_id = auth()->id();
        // });
    }
}