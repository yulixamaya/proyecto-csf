<?php

use App\Http\Controllers\LugarController;
use App\Http\Controllers\UsuarioController;
use App\Models\Lugar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

Route::get("/roles", [RolController::class, "buscarTodos"]);

Route::post("/roles", [RolController::class,"crearRol"]);

Route::get("/usuarios", [UsuarioController::class, "buscarUsuarios"]);
Route::post("/registro", [UsuarioController::class, "registro"]);
Route::post("/inicio-sesion", [UsuarioController::class, "inicioSesion"]);
//ruta de lugares
Route::get("/lugares", [LugarController::class, "buscarLugares"]);
//buscar lugares por el id
Route::get("/lugares/{id}", [LugarController::class, "buscarLugarId"]);
//crear lugares
Route::post("/lugares", [LugarController::class, "agregarLugar"]);
//modificar lugar
Route::put("/lugares/{id}",[LugarController::class, "modificarLugar"]);
//eliminar lugar
Route::delete("/lugares/{id}",[LugarController::class, "eliminarLugar"]);




