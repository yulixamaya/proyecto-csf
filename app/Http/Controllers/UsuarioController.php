<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function buscarUsuarios()
    {
        return Usuario::all();
    }

}
