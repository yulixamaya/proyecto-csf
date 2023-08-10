<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

Route::get("/roles", [RolController::class, "buscarTodos"]);

Route::post("/roles", [RolController::class,"crearRol"]);

Route::get("/usuarios", [UsuarioController::class, "buscarUsuarios"]);
Route::post("/registro", [UsuarioController::class, "registro"]);
Route::post("/inicio-sesion", [UsuarioController::class, "inicioSesion"]);


