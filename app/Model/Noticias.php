<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'data',
        'horario',
        'imagem',
    ];
}
