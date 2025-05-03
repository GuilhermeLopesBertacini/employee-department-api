<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    protected $table = 'funcionario';
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'endereco',
        'telefone',
        'email',
        'cargo',
        'salario',
        'data_admissao',
        'data_demissao',
    ];
}
