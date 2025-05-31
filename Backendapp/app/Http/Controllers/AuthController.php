<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //Registra Nuevo medicos o Admins utlizando el Codigo de invitacion

    public function register($request){
        //valida campos recibidos
        $data = $request->Validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,medico',
            'invitation_code' => 'required|string',]);

    //verifica el codigo de invitacion coincida
    if($data['invitation_code'] !== 'consultorioMV2025') {
        return response()->json([
            'error'=> 'Codigo de Invitacion invalido'
        ],401);} //retorna un error 401 si el codigo es invalido
    
    //crea el usuario en la base de datos encriptando la contraseña
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role'],]);
    
    //devuelve una respuesta JSON con la confirmacion de la creacion del usuario    
    return response()->json([
        'message' => 'Usuario creado exitosamente',
        'user' => $user], 201);}
    
    //Autentica al usuario y retorna un token para futuras peticiones
    public function login(Request $request){
        //valida email y password
        $credentials = $request->Validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',]);
    
        //intenta autenticar con los datos
        if(!auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Credenciales invalidas',], 401);//retorna un error 401 si las credenciales son invalidas
        }
    
        //genera un token de acceso personal 
        //$token = auth::user()->createToken('api_token')->plainTextToken;
    
        //retorna token JSON 
        return response()->json([
            'menssege' => 'Login Exitoso',
            'user' => auth::user(),    
            //'token' => $token],
        ]);
    }
}
