<?php

use PHPUnit\Framework\TestCase;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Capsule\Manager as Capsule;

class ConsultaModelTest extends TestCase
{
    protected function setUp(): void
    {
        // Configura o banco de dados para testes
        $this->setUpDatabase();
    }

    protected function setUpDatabase()
    {
        // Inicializa a conexão do Eloquent (capsule) para o banco de dados de testes
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'sqlite', // Usando SQLite em memória para testes
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        // Cria as tabelas para os testes
        $capsule->schema()->create('medicos', function ($table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('crm');
            $table->string('cpf');
            $table->string('especialidade');
            $table->string('telefone');
            $table->string('email');
            $table->text('informacoes_extra')->nullable();
            $table->timestamps();
        });

        $capsule->schema()->create('paciente', function ($table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('cpf');
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('telefone');
            $table->string('nome_mae');
            $table->string('nome_responsavel');
            $table->string('telefone_responsavel');
            $table->string('convenio')->nullable();
            $table->string('plano_saude')->nullable();
            $table->timestamps();
        });

        $capsule->schema()->create('consulta', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('paciente_id');
            $table->date('data');
            $table->time('hora');
            $table->decimal('valor', 10, 2);
            $table->string('consultorio');
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');
        });
    }

    public function testCreateConsulta()
    {
        // Cria um médico e um paciente para associar à consulta
        $medico = Medico::create([
            'nome' => 'Dr. João',
            'crm' => '123456',
            'cpf' => '123.456.789-00',
            'especialidade' => 'Cardiologia',
            'telefone' => '99999-9999',
            'email' => 'joao@example.com',
            'informacoes_extra' => 'Informações adicionais aqui.'
        ]);

        $paciente = Paciente::create([
            'nome_completo' => 'Maria Silva',
            'cpf' => '123.456.789-01',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Feminino',
            'telefone' => '88888-8888',
            'nome_mae' => 'Ana Silva',
            'nome_responsavel' => 'Ana Silva',
            'telefone_responsavel' => '88888-8888',
            'convenio' => 'Convenio A',
            'plano_saude' => 'Plano A'
        ]);

        // Cria uma nova consulta
        $consulta = Consulta::create([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data' => '2024-10-01',
            'hora' => '10:00:00',
            'valor' => 200.00,
            'consultorio' => 'Consultório 1'
        ]);

        $this->assertInstanceOf(Consulta::class, $consulta);
        $this->assertEquals($medico->id, $consulta->medico_id);
        $this->assertEquals($paciente->id, $consulta->paciente_id);
    }

    public function testRetrieveConsulta()
    {
        // Cria um médico e um paciente
        $medico = Medico::create([
            'nome' => 'Dr. Maria',
            'crm' => '654321',
            'cpf' => '987.654.321-00',
            'especialidade' => 'Pediatria',
            'telefone' => '88888-8888',
            'email' => 'maria@example.com',
            'informacoes_extra' => 'Informações adicionais.'
        ]);

        $paciente = Paciente::create([
            'nome_completo' => 'Carlos Santos',
            'cpf' => '987.654.321-01',
            'data_nascimento' => '1985-05-05',
            'sexo' => 'Masculino',
            'telefone' => '77777-7777',
            'nome_mae' => 'Maria Santos',
            'nome_responsavel' => 'Maria Santos',
            'telefone_responsavel' => '77777-7777',
            'convenio' => 'Convenio B',
            'plano_saude' => 'Plano B'
        ]);

        // Cria uma consulta
        $consulta = Consulta::create([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data' => '2024-10-02',
            'hora' => '11:00:00',
            'valor' => 150.00,
            'consultorio' => 'Consultório 2'
        ]);

        // Recupera a consulta pelo ID
        $retrievedConsulta = Consulta::find($consulta->id);

        $this->assertNotNull($retrievedConsulta);
        $this->assertEquals($medico->id, $retrievedConsulta->medico_id);
        $this->assertEquals($paciente->id, $retrievedConsulta->paciente_id);
    }

    public function testUpdateConsulta()
    {
        // Cria um médico e um paciente
        $medico = Medico::create([
            'nome' => 'Dr. Paulo',
            'crm' => '789456',
            'cpf' => '321.654.987-00',
            'especialidade' => 'Neurologia',
            'telefone' => '66666-6666',
            'email' => 'paulo@example.com',
            'informacoes_extra' => 'Informações aqui.'
        ]);

        $paciente = Paciente::create([
            'nome_completo' => 'Ana Lima',
            'cpf' => '456.789.123-00',
            'data_nascimento' => '1995-08-15',
            'sexo' => 'Feminino',
            'telefone' => '55555-5555',
            'nome_mae' => 'Clara Lima',
            'nome_responsavel' => 'Clara Lima',
            'telefone_responsavel' => '55555-5555',
            'convenio' => 'Convenio C',
            'plano_saude' => 'Plano C'
        ]);

        // Cria uma consulta
        $consulta = Consulta::create([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data' => '2024-10-03',
            'hora' => '12:00:00',
            'valor' => 300.00,
            'consultorio' => 'Consultório 3'
        ]);

        // Atualiza a consulta
        $consulta->valor = 350.00;
        $consulta->save();

        // Verifica se a atualização foi bem-sucedida
        $this->assertEquals(350.00, $consulta->valor);
    }

    public function testDeleteConsulta()
    {
        // Cria um médico e um paciente
        $medico = Medico::create([
            'nome' => 'Dr. Julia',
            'crm' => '321654',
            'cpf' => '654.321.987-00',
            'especialidade' => 'Oftalmologia',
            'telefone' => '44444-4444',
            'email' => 'julia@example.com',
            'informacoes_extra' => 'Mais informações.'
        ]);

        $paciente = Paciente::create([
            'nome_completo' => 'Fernando Costa',
            'cpf' => '789.321.654-00',
            'data_nascimento' => '2000-12-12',
            'sexo' => 'Masculino',
            'telefone' => '33333-3333',
            'nome_mae' => 'Luiza Costa',
            'nome_responsavel' => 'Luiza Costa',
            'telefone_responsavel' => '33333-3333',
            'convenio' => 'Convenio D',
            'plano_saude' => 'Plano D'
        ]);

        // Cria uma consulta
        $consulta = Consulta::create([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data' => '2024-10-04',
            'hora' => '13:00:00',
            'valor' => 250.00,
            'consultorio' => 'Consultório 4'
        ]);

        // Exclui a consulta
        $consultaId = $consulta->id;
        $consulta->delete();

        // Verifica se a consulta foi excluída
        $this->assertNull(Consulta::find($consultaId));
    }
}
