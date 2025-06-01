<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Guarda el msn de contacto en la base de datos
    public function store(Request $request){
        //valida los campos del formulario de contacto
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:250',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000']);

    //inserta el registro utilizando el modelo contact
    $contact = Contact::create($data);

    //retorna JSON confirmando el envio
    return response()->json([
        'message' => 'Mensaje enviado con exito',
        'contact' => $contact], 201);   
}
}