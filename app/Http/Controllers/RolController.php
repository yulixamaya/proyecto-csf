<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function buscarTodos()
    {
        return Rol::all();
    }

    public function crearRol(Request $request)
    {
        $request->validate([
            "nombre" => "required"
        ]);

        $data["nombre"] = $request['nombre'];

        $res = Rol::create($data);

        return response()->json($res, 200);
    }

}
