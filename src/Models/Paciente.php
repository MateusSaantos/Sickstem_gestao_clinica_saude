<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    // Nome da tabela associada ao Model
    protected $table = 'paciente';

    // Chave primária da tabela
    protected $primaryKey = 'id';

    // Campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = [
        'nome_completo',
        'cpf',
        'data_nascimento',
        'sexo',
        'telefone',
        'nome_mae',
        'nome_responsavel',
        'telefone_responsavel',
        'convenio',
        'plano_saude'
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'data_nascimento',
    ];

    // Desabilita os timestamps padrão se não forem necessários
    public $timestamps = true;
}
