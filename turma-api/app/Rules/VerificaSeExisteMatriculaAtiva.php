<?php

namespace App\Rules;

use App\Models\Matricula;
use Illuminate\Contracts\Validation\Rule;

class VerificaSeExisteMatriculaAtiva implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (Matricula::where(['aluno_id' => $value, 'ativo' => 1])->count() == 0){
            return true;
        }
    }

    public function message()
    {
        return 'Já existe uma matricula ativa para o aluno selecionado!';
    }
}
