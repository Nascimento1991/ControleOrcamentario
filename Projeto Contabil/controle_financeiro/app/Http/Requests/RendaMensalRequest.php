<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendaMensalRequest extends FormRequest
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
            'NOME_RENDA_MENSAL' => 'required',
            'VALOR_RENDA_MENSAL' => 'required',
        ];
    }

    // Mensagens de erro personalizadas (opcional)
    public function messages()
    {
        return [
            'NOME_RENDA_MENSAL.required' => 'O nome da renda mensal é obrigatório.',
            'VALOR_RENDA_MENSAL.required' => 'O valor da renda mensal é obrigatorio',
        ];
    }
}
