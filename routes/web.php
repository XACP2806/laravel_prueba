<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; // <-- Agrega esta línea para importar tu controlador

Route::get('/', function () {
    return view('welcome');
});

// El código de tu diapositiva:
//Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
//});