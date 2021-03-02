<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Http\Requests\MatriculaRequest;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;


class MatriculaApiController extends Controller
{
      public function index ()
    {
        return Matricula::all();
    }

    public function store(MatriculaRequest $request)
    {
        try {

        $data = Matricula::create($request->validated());

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível cadastrar a matricula!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function show(Request $request)
    {
        try {

        $data =  Matricula::findOrFail($request->id);

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados da matricula!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function update(MatriculaRequest $request)
    {
        try {

        $matricula = Matricula::where('id', $request->id)->first();

        if ($matricula !== null) {
            $matricula = $matricula->update($request->all());
        }

        return response()->json([
            'info' => 'success',
            'result' => $matricula
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível editar!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function destroy(Request $request)
    {
        try {

        $matricula = Matricula::find($request->id);

        $matricula = $matricula->delete();

        return response()->json([
            'info' => 'success',
            'result' => $matricula
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível excluir!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }
}
