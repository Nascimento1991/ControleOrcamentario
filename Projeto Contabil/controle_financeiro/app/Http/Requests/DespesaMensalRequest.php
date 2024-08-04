<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespesaMensalRequest extends FormRequest
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
            'NOME_DESPESA_MENSAL' => 'required',
            'VALOR_DESPESA_MENSAL' => 'required',
        ];
    }

    // Mensagens de erro personalizadas (opcional)
    public function messages()
    {
        return [
            'NOME_DESPESA_MENSAL.required' => 'O nome da despesa mensal é obrigatório.',
            'VALOR_DESPESA_MENSAL.required' => 'O valor da despesa mensal é obrigatorio',
        ];
    }
}
