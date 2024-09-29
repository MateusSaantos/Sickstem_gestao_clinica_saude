<?php

namespace App\Facades;

use App\Controllers\ConsultaController;
use App\Controllers\PacienteController;
use App\Controllers\MedicoController;

class RelatorioFacade
{
    private $consultaController;
    private $pacienteController;
    private $medicoController;

    public function __construct()
    {
        $this->consultaController = new ConsultaController();
        $this->pacienteController = new PacienteController();
        $this->medicoController = new MedicoController();
    }

    /**
     * Método para gerar o relatório de consultas
     */
    public function gerarRelatorioConsultas()
    {
        // Obtém as consultas com detalhes dos pacientes e médicos
        $consultas = $this->consultaController->listarConsultasComDetalhes();
        //$consultas_paciente =$this->pacienteController->listarPacientes();
        //$consultas_medicos =$this->medicoController->listarMedicos();

        // Exibe o relatório
        $this->exibirRelatorio($consultas);
    }

    /**
     * Método privado para exibir o relatório na tela
     * 
     * @param array $consultas
     */
    private function exibirRelatorio($consultas)
    {
        include '../public/temp_view/relatorio_consultas.php'; // Arquivo de visualização do relatório
    }
}
