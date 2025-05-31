<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;

//ruta para solicitar turnos
Route::post('/appointments', [AppointmentController::class, 'store']);

//ruta para formulario de contacto
Route::post('/contacts', [ContactController::class, 'store']);

//ruta para registro de admin/medico con codigo de invitacion
Route::post('/register', [AuthController::class, 'register']);

//ruta de login de medico/admin
Route::post('/login', [AuthController::class, 'login']);
?>

