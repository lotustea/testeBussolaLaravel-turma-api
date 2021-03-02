<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoApiController extends Controller
{
    public function index ()
    {
        return Aluno::all();
    }

    public function store(AlunoRequest $request)
    {
        try {

        $data = Aluno::create($request->validated());

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível cadastrar o aluno!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function show(Request $request)
    {
        try {

        $data = Aluno::findOrFail($request->id);

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do aluno!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }


    public function update(AlunoRequest $request)
    {
        try {
        $aluno = Aluno::find($request->id)->first();

        if ($aluno !== null) {
            $aluno = $aluno->update($request->all());
        }

        return response()->json([
            'info' => 'success',
            'result' => $aluno
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível atualizar os dados do aluno!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Request $request)
    {
        try {

        $aluno = Aluno::find($request->id);

        $aluno = $aluno->delete();

        return response()->json([
            'info' => 'success',
            'result' => $aluno
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível excluir o aluno!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }
}
