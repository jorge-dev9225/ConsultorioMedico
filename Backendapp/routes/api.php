<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstadisticasController;

//ruta para solicitar turnos
Route::post('/appointments', [AppointmentController::class, 'store']);

//ruta para formulario de contacto
Route::post('/contacts', [ContactController::class, 'store']);

//ruta para registro de admin/medico con codigo de invitacion
Route::post('/register', [AuthController::class, 'register']);

//ruta de login de medico/admin
Route::post('/login', [AuthController::class, 'login']);

//ruta de estadisticas para el dashboard
Route::middleware('auth:sanctum')
    ->get('/estadisticas', [EstadisticasController::class, 'estadisticas']);

//rutas para confirmar y cancelar turnos
Route::middleware('auth:sanctum')
    ->put('/appointments/{id}/confirm', [AppointmentController::class, 'confirm']);
Route::middleware('auth:sanctum')
    ->put('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])

?>

