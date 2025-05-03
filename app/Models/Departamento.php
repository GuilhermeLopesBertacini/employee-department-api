<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'data_criacao',
        'data_atualizacao',
    ];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'id_departamento');
    }
}
