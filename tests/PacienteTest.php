<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\PacienteController;
use Illuminate\Database\Capsule\Manager as Capsule;

class PacienteTest extends TestCase
{
    // Propriedade para o controller
    private $controller;

    protected function setUp(): void
    {
        // Inicializa o controller para cada teste
        $this->controller = new PacienteController();
        // Limpa a tabela 'paciente' para garantir que os testes sejam independentes
        Capsule::table('paciente')->truncate();
    }

    // Teste para verificar o cadastro com dados válidos
    public function testCadastrarPacienteComDadosValidos()
    {
        // Simula os dados do formulário de cadastro
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'nome_completo' => 'Maria Silva',
            'cpf' => '12345678900',
            'data_nascimento' => '1990-05-10',
            'sexo' => 'F',
            'telefone' => '11987654321',
            'nome_mae' => 'Ana Silva',
            'nome_responsavel' => '',
            'telefone_responsavel' => '',
            'convenio' => 'Amil',
            'plano_saude' => 'Prata'
        ];

        ob_start(); // Inicia captura da saída
        $this->controller->cadastrar(); // Executa o método de cadastro do controller
        $output = ob_get_clean(); // Obtém a saída capturada

        // Verifica se a mensagem de sucesso foi exibida
        $this->assertStringContainsString('Paciente cadastrado com sucesso!', $output);

        // Verifica se o paciente foi salvo no banco de dados
        $paciente = Capsule::table('paciente')->where('cpf', '12345678900')->first();
        $this->assertNotNull($paciente);
        $this->assertEquals('Maria Silva', $paciente->nome_completo);
    }

    // Teste para verificar o tratamento de campos vazios
    public function testCadastrarPacienteComCamposVazios()
    {
        // Simula uma requisição POST com campos vazios
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'nome_completo' => '',
            'cpf' => '',
            'data_nascimento' => '',
            'sexo' => '',
            'telefone' => '',
            'nome_mae' => '',
            'nome_responsavel' => '',
            'telefone_responsavel' => '',
            'convenio' => '',
            'plano_saude' => ''
        ];

        ob_start(); // Inicia captura da saída
        $this->controller->cadastrar(); // Executa o método de cadastro
        $output = ob_get_clean(); // Obtém a saída capturada

        // Verifica se uma mensagem de erro ou falha de validação é exibida
        $this->assertStringContainsString('Erro ao cadastrar paciente', $output);

        // Verifica se nenhum paciente foi salvo no banco de dados
        $paciente = Capsule::table('paciente')->where('cpf', '')->first();
        $this->assertNull($paciente);
    }
}
