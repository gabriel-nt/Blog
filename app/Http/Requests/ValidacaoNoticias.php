<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoNoticias extends FormRequest
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
            'titulo' => 'required|min:3|max:70',
            'descricao' => 'required|min:25' ,
            'imagem' => 'required|mimes:jpg,jpeg,png,svg'
        ];
    }

    public function messages() {   
        return [     
            'required' => 'O campo é requerido',     
            'titulo.min' => 'O campo titulo deve ter no mínimo 3 carácteres',
            'titulo.max' => 'O campo titulo deve ter no mínimo 70 carácteres',
            'descricao.min' => 'O campo titulo deve ter no mínimo 25 carácteres', 
            'imagem.mimes' => 'O arquivo inserido deve ser uma imagem' 
        ]; 
    }
}
