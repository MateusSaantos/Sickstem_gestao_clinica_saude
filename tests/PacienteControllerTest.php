<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\PacienteController;
use App\Models\Paciente;

class PacienteControllerTest extends TestCase
{
    protected $pacienteController;

    protected function setUp(): void
    {
        // Cria uma instância do controller para ser usada nos testes
        $this->pacienteController = new PacienteController();
    }

/** @test */
public function testCadastrarPaciente()
{
    // Configura os dados de exemplo para simular um formulário POST
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST = [
        'nome_completo' => 'João Silva',
        'cpf' => '12345678900',
        'data_nascimento' => '1990-01-01',
        'sexo' => 'M',
        'telefone' => '11999999999',
        'nome_mae' => 'Maria Silva',
        'nome_responsavel' => 'Pedro Silva',
        'telefone_responsavel' => '11988888888',
        'convenio' => 'Unimed',
        'plano_saude' => 'Básico'
    ];

    // Mock do Paciente: simula a inserção e cria um stub para o método save
    $pacienteMock = $this->createPartialMock(Paciente::class, ['save']);
    $pacienteMock->expects($this->once())->method('save')->willReturn(true);

    // Substitua este trecho com o método de criação real no controller, se possível
    // Exemplo: caso o método `cadastrar` chame `new Paciente()` dentro dele, o mock não influenciará

    // Captura a saída esperada
    $this->expectOutputString('Paciente cadastrado com sucesso!');
    // Executa o método de cadastro do controller
    $this->pacienteController->cadastrar();
}


    /** @test */
    public function testListarPacientes()
    {
        // Mock do Capsule para simular a busca de pacientes
        $pacientes = [
            (object) ['id' => 1, 'nome_completo' => 'João Silva'],
            (object) ['id' => 2, 'nome_completo' => 'Maria Oliveira']
        ];

        $pacienteMock = $this->getMockBuilder(Paciente::class)
            ->disableOriginalConstructor()
            ->getMock();
        $pacienteMock->expects($this->once())
            ->method('all')
            ->willReturn($pacientes);

        // Verifica se a lista de pacientes é retornada corretamente
        $this->expectOutputRegex('/João Silva/');
        $this->expectOutputRegex('/Maria Oliveira/');
        //$this->pacienteController->listarPacientes();
    }

    /** @test */
    public function testAtualizarPaciente()
    {
        // Configura os dados para simular o envio do formulário de atualização
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'id' => 1,
            'nome_completo' => 'João Silva Atualizado',
            'cpf' => '12345678900',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'M',
            'telefone' => '11999999999',
            'nome_mae' => 'Maria Silva',
            'nome_responsavel' => 'Pedro Silva',
            'telefone_responsavel' => '11988888888',
            'convenio' => 'Unimed',
            'plano_saude' => 'Básico'
        ];

        // Mock do Paciente para simular a atualização
        $pacienteMock = $this->createMock(Paciente::class);
        $pacienteMock->method('update')->willReturn(true);

        // Verifica se o método de atualização exibe a mensagem de sucesso
        $this->expectOutputString('Paciente atualizado com sucesso!');
        //$this->pacienteController->atualizar();
    }
}
