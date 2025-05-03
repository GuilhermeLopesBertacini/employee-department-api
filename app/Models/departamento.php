<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'data_criacao',
        'data_atualizacao',
    ];
}
