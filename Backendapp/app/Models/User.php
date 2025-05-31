<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    //campos que se almacena masivamente
    protected $fillable = ['name', 'email', 'password', 'role'];

    //campos que no deben guardarse en JSON o Arryas
    protected $hidden = ['password', 'remember_token'];

    //relaciones de la base de datos
    public function doctor(){
        return $this->hasOne(Doctor::class);
    }
}
