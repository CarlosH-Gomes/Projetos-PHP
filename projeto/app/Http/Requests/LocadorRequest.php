<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocadorRequest extends FormRequest
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
        return[
            'nome' => 'required|string|max:100',
            'CPF'=> 'required|string|max:100',
            'RG'=> 'required|string|max:20',
            'Data_Nasci'=> 'required',
            'Telefone'=> 'required|string|max:20',
            'email'=> 'required|string|max:100',
            'cidade_locador_id' => 'required',
            ];
    }
}
