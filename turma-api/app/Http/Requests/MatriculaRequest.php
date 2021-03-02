<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VerificaSeExisteMatriculaAtiva;



class MatriculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'turma_id' => ['required'],
            'aluno_id' => ['required', new VerificaSeExisteMatriculaAtiva],
            'ativo' => ['required', 'boolean']
        ];
    }
}
