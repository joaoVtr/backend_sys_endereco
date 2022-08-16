<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnderecoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'CEP' => 'required|string|formato_cep|max:9',
            'logradouro' => 'required|string',
            'numero' => 'required|string|max:10',
            'complemento' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string|max:50',
            'estado' => 'required|string|max:30'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'CEP.formato_cep' => 'Favor digitar um cep com formato válido. Ex: (99999-999 ou 99.999-999)',

            'CEP.required' => 'O campo CEP é obrigatório',
            'logradouro.required' => 'O campo Logradouro é obrigatório',
            'numero.required' => 'O campo Número é obrigatório',
            'complemento.required' => 'O campo Complemento é obrigatório',
            'bairro.required' => 'O campo Bairro é obrigatório',
            'cidade.required' => 'O campo Cidade é obrigatório',
            'estado.required' => 'O campo Estado é obrigatório',

            'CEP.string' => 'O campo Cep deve ser do tipo String',
            'logradouro.string' => 'O campo Logradouro deve ser do tipo String',
            'numero.string' => 'O campo Número deve ser do tipo String',
            'complemento.string' => 'O campo Complemento deve ser do tipo String',
            'bairro.string' => 'O campo Bairro deve ser do tipo String',
            'cidade.string' => 'O campo Cidade deve ser do tipo String',
            'estado.string' => 'O campo Estado deve ser do tipo String',

            'estado.max' => 'O campo Estado deve ter no máximo 30 caracteres',
            'cidade.max' => 'O campo Cidade deve ter no máximo 50 caracteres',
            'numero.max' => 'O campo Número deve ter no máximo 10 caracteres',
            'CEP.max' => 'O campo Número deve ter no máximo 9 caracteres',
        ];
    }
}
