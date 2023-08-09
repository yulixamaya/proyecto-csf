<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;

class RolController extends Controller
{

    public function buscarTodos()
    {
        return Rol::all();
    }

}
