<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lugar;
use Illuminate\Http\Request;


class LugarController extends Controller
{
    public function buscarLugares()
    {
        try {
            return Lugar::all();
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getMessage()
            ], 500);

        }
    }

    public function buscarLugarId($id)
    {
        try {
            $lugar = Lugar::find($id);

            if ($lugar) {
                return response()->json($lugar, 200);
            } else {
                return response()->json([
                    "mensaje" => "No existe lugar con id: $id"
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getMessage()
            ], 500);

        }

    }

    public function agregarLugar(Request $request)
    {
        try {
            $request->validate([
                "direccion" => "required",
                "nombre" => "required",
                "telefono" => "required",
                "correo" => ["required", "email"]
            ]);

            $data["direccion"] = $request['direccion'];
            $data["nombre"] = $request['nombre'];
            $data["telefono"] = $request["telefono"];
            $data["correo"] = $request["correo"];

            return Lugar::create($data);

        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getMessage()
            ], 500);

        }
    }


    public function ModificarLugar(Request $request, $id)
    {

        try {
            $request->validate([
                "direccion" => "required",
                "nombre" => "required",
                "telefono" => "required",
                "correo" => ["required", "email"]
            ]);

            $data["direccion"] = $request['direccion'];
            $data["nombre"] = $request['nombre'];
            $data["telefono"] = $request["telefono"];
            $data["correo"] = $request["correo"];

            $lugar = Lugar::find($id);

            if ($lugar) {

                $lugar->direccion = $data["direccion"];
                $lugar->nombre = $data["nombre"];
                $lugar->telefono = $data["telefono"];
                $lugar->correo = $data["correo"];

                $lugar->save();
                return response()->json($lugar, 200);




            } else {

                return response()->json([
                    "mensaje" => "No existe lugar con id: $id"
                ], 404);

            }



        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getMessage()
            ], 500);

        }
    }

    public function eliminarLugar($id)
    {
        try {
            $lugar = Lugar::find($id);

            if ($lugar) {

                $lugar->delete();


                return response()->json($lugar, 200);


            } else {

                return response()->json([
                    "mensaje" => "No existe lugar con id: $id"
                ], 404);

            }

        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getMessage()
            ], 500);

        }
    }
}
