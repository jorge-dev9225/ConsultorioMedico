<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
   //almacena una nueva solicitud de turno en la base de datos
   public function store(Request $request){ 
    $data = $request->validate([ //valida los datos de entrada del formulario   
        'patient_name' => 'required|string|max:255',
        'patient_email' => 'required|email|max:255',
        'patient_phone' => 'required|string|max:20',
        'specialty' => 'required|string|max:100',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',]);

    //crea el turno usando eloquent
    $appointment = Appointment::create([
        'patient_name' => $data['patient_name'],
        'patient_email' => $data['patient_email'],
        'patient_phone' => $data['patient_phone'],
        'specialty' => $data['specialty'],
        'date' => $data['date'],
        'time' => $data['time'],
        'status' => 'pending', ]);

    //retorna un JSON confirmando la creacion
    return response()->json([
        'menssege' => 'Turno solicitado con exito',
        'appointment' => $appointment,], 201);
    }

    public function confirm($id) {
        $appointment = Appointment::findOrFail($id);
        if ($appointment->status !== 'pending'){
            return response ()-> json([
                'message' => 'Solo puede confirmar turnos pendientes'
            ], 400);
        }
        $appointment->status = 'confirmed';
        $appointment->save();
        return response()->json([
            'message' => 'Turno confirmado con exito',
        ]);
    }

    public function cancel($id) {
        $appointment = Appointment::findOrFail($id);
        if ($appointment->status !== 'pending'){
            return response ()-> json([
                'message' => 'Solo puede cancelar turnos pendientes'
            ], 400);
        }
        $appointment->status = 'cancelled';
        $appointment->save();
        return response()->json([
            'message' => 'Turno cancelado con exito',
        ]);
    }
}