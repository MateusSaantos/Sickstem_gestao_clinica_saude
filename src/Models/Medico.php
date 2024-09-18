<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    // Nome da tabela associada ao Model
    protected $table = 'medicos';

    // Chave primária da tabela
    protected $primaryKey = 'id';

    // Campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = [
        'nome',
        'crm',
        'cpf',
        'especialidade',
        'telefone',
        'email',
        'informacoes_extra'
    ];

    // Campos que devem ser tratados como datas (se necessário)
    // Caso 'informacoes_extra' não seja um campo de data, ele não deve estar aqui
    protected $dates = [
        // Adicione campos de data se houver
    ];

    // Desabilita os timestamps padrão se não forem necessários
    public $timestamps = true;
}
