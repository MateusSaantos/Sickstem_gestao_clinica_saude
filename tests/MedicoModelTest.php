<?php

use PHPUnit\Framework\TestCase;
use App\Models\Medico;
use Illuminate\Database\Capsule\Manager as Capsule;

class MedicoModelTest extends TestCase
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

        // Cria a tabela 'medicos' para os testes
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
    }

    public function testCreateMedico()
    {
        $medico = Medico::create([
            'nome' => 'Dr. João',
            'crm' => '123456',
            'cpf' => '123.456.789-00',
            'especialidade' => 'Cardiologia',
            'telefone' => '99999-9999',
            'email' => 'joao@example.com',
            'informacoes_extra' => 'Informações adicionais aqui.'
        ]);

        $this->assertInstanceOf(Medico::class, $medico);
        $this->assertEquals('Dr. João', $medico->nome);
        $this->assertEquals('123456', $medico->crm);
        $this->assertEquals('Cardiologia', $medico->especialidade);
    }

    public function testRetrieveMedico()
    {
        // Cria um médico para teste
        $medico = Medico::create([
            'nome' => 'Dr. Maria',
            'crm' => '654321',
            'cpf' => '987.654.321-00',
            'especialidade' => 'Pediatria',
            'telefone' => '88888-8888',
            'email' => 'maria@example.com',
            'informacoes_extra' => 'Informações adicionais.'
        ]);

        // Recupera o médico pelo ID
        $retrievedMedico = Medico::find($medico->id);

        $this->assertNotNull($retrievedMedico);
        $this->assertEquals('Dr. Maria', $retrievedMedico->nome);
        $this->assertEquals('654321', $retrievedMedico->crm);
        $this->assertEquals('Pediatria', $retrievedMedico->especialidade);
    }

    public function testUpdateMedico()
    {
        // Cria um médico para teste
        $medico = Medico::create([
            'nome' => 'Dr. Pedro',
            'crm' => '789456',
            'cpf' => '321.654.987-00',
            'especialidade' => 'Neurologia',
            'telefone' => '77777-7777',
            'email' => 'pedro@example.com',
            'informacoes_extra' => 'Informações aqui.'
        ]);

        // Atualiza o médico
        $medico->nome = 'Dr. Pedro Atualizado';
        $medico->save();

        // Verifica se a atualização foi bem-sucedida
        $this->assertEquals('Dr. Pedro Atualizado', $medico->nome);
    }

    public function testDeleteMedico()
    {
        // Cria um médico para teste
        $medico = Medico::create([
            'nome' => 'Dr. Ana',
            'crm' => '321654',
            'cpf' => '456.789.123-00',
            'especialidade' => 'Ortopedia',
            'telefone' => '66666-6666',
            'email' => 'ana@example.com',
            'informacoes_extra' => 'Mais informações.'
        ]);

        // Exclui o médico
        $medicoId = $medico->id;
        $medico->delete();

        // Verifica se o médico foi excluído
        $this->assertNull(Medico::find($medicoId));
    }
}
