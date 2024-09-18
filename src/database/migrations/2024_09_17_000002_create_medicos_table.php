<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('medicos', function (Blueprint $table) {
            $table->id(); // Adiciona um campo `id` auto-incrementável
            $table->string('nome');
            $table->string('crm')->unique();
            $table->string('cpf')->unique();
            $table->string('especialidade');
            $table->string('telefone');
            $table->string('email')->unique();
            $table->text('informacoes_extra')->nullable();
            $table->timestamps(); // Adiciona os campos `created_at` e `updated_at`
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('medicos');
    }
}
