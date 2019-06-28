<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoContato extends FormRequest
{
    /**
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Regras de validações.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'contato_email' => 'required|min:15' ,
            'mensagem' => 'required|max:500'
        ];
    }

    public function messages() {   
        return [     
            'required' => 'O campo é requerido',     
            'nome.min' => 'O campo titulo deve ter no mínimo 3 carácteres',
            'mensagem.max' => 'O campo titulo deve ter no mínimo 500 carácteres',
            'email.min' => 'O campo email deve ter no mínimo 15 carácteres', 
        ]; 
    }
}