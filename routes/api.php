<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatImageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cats', [CatImageController::class, 'index']); // Mostrar todas las imágenes de gatos
Route::get('/cats/{id}', [CatImageController::class, 'show']); // Mostrar una imagen de gato específica
Route::get('/cats/tags/{tag}', [CatImageController::class, 'findByTag']); // Filtrar imágenes de gatos por etiqueta
