<?php

namespace App\Http\Controllers;
use App\Models\Appointment;

class EstadisticasController extends Controller
{
    public function estadisticas(){
        $pendientes = Appointment::where('status', 'pending')->count();
        $confirmados = Appointment::where('status', 'confirmed')->count();
        $cancelados = Appointment::where('status', 'cancelled')->count();

        return response()->json([
            'pendientes' => $pendientes,
            'confirmados' => $confirmados,
            'cancelados' => $cancelados,
        ]);
    }
}
