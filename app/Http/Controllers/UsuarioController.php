<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function buscarUsuarios()
    {
        return Usuario::all();
    }


    public function inicioSesion(Request $request)
    {

        $request->validate([
            "usuario" => "required",
            "contrasena" => "required"
        ]);

        $data["usuario"] = $request['usuario'];
        $data["contrasena"] = $request['contrasena'];

        $usuario = Usuario::where("usuario", $data["usuario"])->first();

        if ($usuario) {
            if (Hash::check($data["contrasena"], $usuario["contrasena"])) {
                $token = $usuario->createToken("ejemplo");

                return response()->json(
                    ["token" => $token->plainTextToken],
                    200
                );
            }
        }



        return response()->json("error", 400);
    }

    public function registro(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "apellido" => "required",
            "telefono" => "required",
            "usuario" => "required",
            "contrasena" => "required",
            "rol" => "required",
        ]);

        $contrasenaEncriptada = Hash::make($request['contrasena']);

        $data["nombre"] = $request['nombre'];
        $data["apellido"] = $request['apellido'];
        $data["telefono"] = $request['telefono'];
        $data["usuario"] = $request['usuario'];
        $data["contrasena"] = $contrasenaEncriptada;
        $data["rol"] = $request['rol'];

        $res = Usuario::create($data);

        return response()->json($res, 200);
    }

}
