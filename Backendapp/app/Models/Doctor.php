<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //campos asignables masivamente
    protected $fillable = ['user_id', 'specialty', 'phone'];

    //relacion de tablas en base de datos
    public function user(){
        return $this->belongsTo(User::class);
    }
}

