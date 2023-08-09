<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

Route::get("/roles", [RolController::class, "buscarTodos"])->middleware("auth:sanctum");

Route::get("/usuarios", [UsuarioController::class, "buscarUsuarios"]);
