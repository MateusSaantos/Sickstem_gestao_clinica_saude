<?php

use App\Models\Paciente;
use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase;

class PacienteModelTest extends TestCase
{
    protected function setUp(): void
    {
        // Configuração do Capsule para testes
        $capsule = new Capsule;

        // Adiciona a conexão de teste com SQLite em memória
        $capsule->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        // Torna a instância do Capsule globalmente acessível
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        // Criação da tabela de pacientes
        $capsule::schema()->create('paciente', function ($table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('telefone')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->string('telefone_responsavel')->nullable();
            $table->string('convenio')->nullable();
            $table->string('plano_saude')->nullable();
            $table->timestamps();
        });
    }

    public function testCreatePaciente()
    {
        // Criação de um novo paciente
        $paciente = Paciente::create([
            'nome_completo' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Masculino',
            'telefone' => '11987654321',
            'nome_mae' => 'Maria Silva',
            'nome_responsavel' => 'José Silva',
            'telefone_responsavel' => '11976543210',
            'convenio' => 'Unimed',
            'plano_saude' => 'Pleno'
        ]);

        // Verifica se o paciente foi salvo corretamente
        $this->assertNotNull($paciente->id);
        $this->assertEquals('João Silva', $paciente->nome_completo);
        $this->assertEquals('12345678901', $paciente->cpf);
    }

    public function testReadPaciente()
    {
        // Criação de um novo paciente
        $paciente = Paciente::create([
            'nome_completo' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Masculino',
            'telefone' => '11987654321',
        ]);

        // Leitura do paciente pelo ID
        $pacienteLido = Paciente::find($paciente->id);

        // Verifica se o paciente lido é o mesmo que foi salvo
        $this->assertEquals($paciente->id, $pacienteLido->id);
        $this->assertEquals('João Silva', $pacienteLido->nome_completo);
    }

    public function testUpdatePaciente()
    {
        // Criação de um novo paciente
        $paciente = Paciente::create([
            'nome_completo' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Masculino',
        ]);

        // Atualiza o nome do paciente
        $paciente->nome_completo = 'João Pedro Silva';
        $paciente->save();

        // Verifica se o nome foi atualizado
        $this->assertEquals('João Pedro Silva', $paciente->fresh()->nome_completo);
    }

    public function testDeletePaciente()
    {
        // Criação de um novo paciente
        $paciente = Paciente::create([
            'nome_completo' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Masculino',
        ]);

        // Deletar o paciente
        $pacienteId = $paciente->id;
        $paciente->delete();

        // Verifica se o paciente foi deletado
        $this->assertNull(Paciente::find($pacienteId));
    }

    protected function tearDown(): void
    {
        // Limpa a tabela de pacientes após cada teste
        Capsule::schema()->dropIfExists('paciente');
    }
}
