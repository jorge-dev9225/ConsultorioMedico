<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_name', 'patient_email', 'patient_phone','specialty', 'date', 'time', 'status'];
}
