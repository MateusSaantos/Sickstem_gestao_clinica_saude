<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    // Nome da tabela associada ao Model
    protected $table = 'consultas';

    // Chave primária da tabela
    protected $primaryKey = 'id';

    // Campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = [
        'medico_id',
        'paciente_id',
        'data',
        'hora',
        'valor',
        'consultorio'
    ];

    // Define os relacionamentos com outras tabelas
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    // Campos que devem ser tratados como datas
    protected $dates = [
        'data',
        'hora',
        'created_at',
        'updated_at',
    ];

    // Habilita os timestamps padrão
    public $timestamps = true;
}
