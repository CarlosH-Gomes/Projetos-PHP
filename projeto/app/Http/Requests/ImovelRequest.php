<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
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
            
            'Rua' =>  'required|string|max:100',
            'Bairro' =>  'required|string|max:100',
            'CEP' =>  'required|string|max:9',
            'Numero' =>  'required|string|max:8',
            'Complemento' =>  'required|string|max:20',
            'Valor' =>  'required|string|max:20',
            'Tipo' =>  'required|string|max:20',
            'Estilo' =>  'required|string|max:20',
            'locador_id' => 'required',
            'cidade_imovel_id' => 'required',
        ];
    }
}
