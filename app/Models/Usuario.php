<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usuarios';

    protected $fillable = [
        "nombre",
        "apellido",
        "telefono",
        "usuario",
        "contrasena",
        "rol"
    ];
}
