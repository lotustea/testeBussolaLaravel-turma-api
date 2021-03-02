<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Matricula;
use App\Models\Aluno;

class TurmaApiController extends Controller
{
    public function index ()
    {
        return Turma::all();
    }

    public function store(TurmaRequest $request)
    {
        try {

        $data = Turma::create($request->validated());

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível cadastrar a turma!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function show(Request $request)
    {
        try {

        $data = Turma::findOrFail($request->id);

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados da turma!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function getAlunosComMatriculasAtivasOnTurma(Request $request)
    {
        try {
        $matriculas =  Matricula::where('turma_id', $request->id)->get();
        $alunos = [];
           foreach ($matriculas as $matricula) {
                $aluno  = Aluno::find($matricula->aluno_id);
                array_push($alunos, $aluno);
            }
        return response()->json([
            'info' => 'success',
            'result' => $alunos
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os alunos da turma!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function update(TurmaRequest $request)
    {
        try {
        $turma = Turma::find($request->id)->first();

        if ($turma !== null) {
            $turma = $turma->update($request->all());
        }

        return response()->json([
            'info' => 'success',
            'result' => $turma
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível atualizar os dados da turma!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Request $request)
    {
        try {

        $turma = Turma::find($request->id);

        $turma = $turma->delete();

        return response()->json([
            'info' => 'success',
            'result' => $turma
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível excluir a turma!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

}
