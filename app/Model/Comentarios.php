<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $fillable = [
        'noticia_id',
        'nome',
        'conteudo',
        'data',
        'horario',
    ];
}
