<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|string|email',
            'password'=>'required|string|min:8'
        ];
    }

    public function messages(){
        return [
            'email.required'=>'O e-mail deve ser informado',
            'email.email'=>'O endereço de e-mail deve ser válido',
            'password.required' =>'A senha deve ser informada',
            'password.min'=>"A senha deve ter oito caracteres",
        ];
    }
}
