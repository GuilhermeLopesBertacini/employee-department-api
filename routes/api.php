<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;

// FUNCIONÁRIOS
Route::get('/funcionarios', [FuncionarioController::class, 'index']);
Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show']);
Route::post('/funcionarios', [FuncionarioController::class, 'store']);
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update']);
Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy']);

// DEPARTAMENTOS
Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/departamentos/{id}', [DepartamentoController::class, 'show']);
Route::post('/departamentos', [DepartamentoController::class, 'store']);
Route::put('/departamentos/{id}', [DepartamentoController::class, 'update']);
Route::delete('/departamentos/{id}', [DepartamentoController::class, 'destroy']);

// RELACIONAMENTOS
Route::get('/funcionarios/{id}/departamento', [FuncionarioController::class, 'getDepartamento']);
Route::get('/departamentos/{id}/funcionarios', [DepartamentoController::class, 'getFuncionarios']);
Route::get('/relatorio/funcionarios-com-departamentos', [FuncionarioController::class, 'listarComDepartamentos']);
Route::get('/relatorio/departamentos-com-funcionarios', [DepartamentoController::class, 'listarComFuncionarios']);
