<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('consultas', function (Blueprint $table) {
            $table->id(); // Adiciona um campo `id` auto-incrementável
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade'); // Chave estrangeira para `medicos`
            $table->foreignId('paciente_id')->constrained('paciente')->onDelete('cascade'); // Chave estrangeira para `paciente`
            $table->date('data'); // Campo para a data da consulta
            $table->time('hora'); // Campo para a hora da consulta
            $table->decimal('valor', 10, 2); // Campo para o valor da consulta
            $table->string('consultorio', 50); // Campo para o consultório
            $table->timestamps(); // Adiciona os campos `created_at` e `updated_at`
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('consultas');
    }
}
