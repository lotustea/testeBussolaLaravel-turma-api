<?php

use App\Http\Controllers\TurmaApiController;
use App\Http\Controllers\AlunoApiController;
use App\Http\Controllers\MatriculaApiController;

use GuzzleHttp\Middleware;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


    //routes alunos
    Route::get('/alunos', [AlunoApiController::class, 'index']);
    Route::get('/alunos/{id}', [AlunoApiController::class, 'show']);
    Route::post('/alunos', [AlunoApiController::class, 'store']);
    Route::put('/alunos/{id}',[AlunoApiController::class, 'update']);
    Route::delete('/alunos/{id}', [AlunoApiController::class, 'destroy']);


    //routes turmas
    Route::get('/turmas', [TurmaApiController::class, 'index']);
    Route::get('/turmas/{id}', [TurmaApiController::class, 'show']);
    Route::get('/turmas/{id}/alunosAtivos', [TurmaApiController::class, 'getAlunosComMatriculasAtivasOnTurma']);
    Route::post('/turmas', [TurmaApiController::class, 'store']);
    Route::put('/turmas/{id}',[TurmaApiController::class, 'update']);
    Route::delete('/turmas/{id}', [TurmaApiController::class, 'destroy']);


    //routes matriculas
    Route::get('/matriculas', [MatriculaApiController::class, 'index']);
    Route::get('/matriculas/{id}', [MatriculaApiController::class, 'show']);
    Route::post('/matriculas', [MatriculaApiController::class, 'store']);
    Route::put('/matriculas/{id}',[MatriculaApiController::class, 'update']);
    Route::delete('/matriculas/{id}', [MatriculaApiController::class, 'destroy']);



