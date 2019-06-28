<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comentarios;

class ComentariosController extends Controller
{

    /**
     * Criação de comentários para determinado post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comentarios $comentarios)
    {
        date_default_timezone_set('America/Sao_Paulo');
		$data = date("d/m/Y");
        $hora = date("H:i:s");
        $comentarios->noticia_id = $request->noticia_id;
        $comentarios->nome = $request->nome;
        $comentarios->conteudo = $request->conteudo;
        $comentarios->data = $data;
        $comentarios->horario = $hora;
        $comentarios->save();
        return back();
    }

}
