<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientesTable
{
    public function up()
    {
        // Criação da tabela 'pacientes'
        Capsule::schema()->create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->date('data_nascimento');
            $table->enum('sexo', ['M', 'F']);
            $table->string('telefone');
            $table->string('nome_mae');
            $table->string('nome_responsavel')->nullable(); // Pode ser nulo se não houver responsável
            $table->string('telefone_responsavel')->nullable(); // Pode ser nulo se não houver responsável
            $table->string('convenio')->nullable(); // Pode ser nulo se não houver convênio
            $table->string('plano_saude')->nullable(); // Pode ser nulo se não houver plano de saúde
            $table->timestamps(); // Cria os campos 'created_at' e 'updated_at'
        });
    }

    public function down()
    {
        // Dropar a tabela 'pacientes' se precisar desfazer a migração
        Capsule::schema()->dropIfExists('pacientes');
    }
}
