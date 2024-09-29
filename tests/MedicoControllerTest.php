<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\MedicoController;
use App\Models\Medico;

class MedicoControllerTest extends TestCase
{
    private $medicoController;

    protected function setUp(): void
    {
        $this->medicoController = new MedicoController();
    }

    /** @test */
    public function testCadastrarMedico()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'nome' => 'Dr. João Silva',
            'crm' => '123456',
            'cpf' => '12345678900',
            'especialidade' => 'Cardiologia',
            'telefone' => '11999999999',
            'email' => 'dr.joao@example.com',
            'informacoes_extra' => 'Atendimento excelente.'
        ];

        // Mock do Medico para simular o comportamento de salvar
        $medicoMock = $this->createMock(Medico::class);
        $medicoMock->expects($this->once())->method('save')->willReturn(true);

        $this->expectOutputString('Médico cadastrado com sucesso!');
        $this->medicoController->cadastrar();
    }

    /** @test */
    public function testAtualizarMedico()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'id' => 1,
            'nome' => 'Dr. João Silva',
            'crm' => '654321',
            'cpf' => '12345678900',
            'especialidade' => 'Ortopedia',
            'telefone' => '11988888888',
            'email' => 'dr.joao@example.com',
            'informacoes_extra' => 'Atendimento reformulado.'
        ];

        // Mock do Medico para simular a atualização
        $medicoMock = $this->createMock(Medico::class);
        $medicoMock->expects($this->once())->method('save')->willReturn(true);

        $this->expectOutputString('Médico atualizado com sucesso!');
        $this->medicoController->atualizar();
    }
}
