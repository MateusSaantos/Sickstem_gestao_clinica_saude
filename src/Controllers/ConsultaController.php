<?php

namespace App\Controllers;

use App\Database\Database;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;

class ConsultaController
{
    // Método para cadastrar uma nova consulta
    public function cadastrar()
    {
        // Verifica se o método é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $medico_id = $_POST['medico_id'];
            $paciente_id = $_POST['paciente_id'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $valor = $_POST['valor'];
            $consultorio = $_POST['consultorio'];

            // Inicializa a conexão com o banco de dados
            $database = Database::getInstance();

            try {
                // Insere a consulta no banco de dados
                Capsule::table('consulta')->insert([
                    'medico_id' => $medico_id,
                    'paciente_id' => $paciente_id,
                    'data' => $data,
                    'hora' => $hora,
                    'valor' => $valor,
                    'consultorio' => $consultorio
                ]);

                // Redireciona para uma página de sucesso ou exibe uma mensagem
                echo "Consulta cadastrada com sucesso!";
            } catch (\Exception $e) {
                // Exibe mensagem de erro
                echo "Erro ao cadastrar consulta: " . $e->getMessage();
            }
        } else {
            // Se não for um POST, redireciona para o formulário de cadastro
            header('Location: /temp_view/consulta_form.php');
            exit;
        }
    }

    // Método para listar todas as consultas
    public function listarConsultas()
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca todas as consultas no banco de dados
        $consultas = Capsule::table('consulta')->get();

        // Converte para array
        $consultasArray = $consultas->toArray();

        // Envia as consultas para a view
        require_once '../public/temp_view/consultas_list.php';
    }

    public function visualizar($id)
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca o médico pelo ID
        $medico = Consulta::find($id);

        if ($medico) {
            // Inclui a view com os dados do médico
            include '../public/temp_view/consulta_view.php';
        } else {
            echo "Consulta não encontrado.";
        }
    }

    public function editar($id)
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca o médico pelo ID
        $medico = Consulta::find($id);

        // Verifica se o médico foi encontrado
        if ($medico) {
            // Inclui a view com o formulário de edição
            include '../public/temp_view/medico_edit.php';
        } else {
            // Médico não encontrado
            echo "Consulta não encontrada.";
        }
    }

    // Método para atualizar uma consulta
    public function atualizar()
    {
        // Verifica se o método é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $id = $_POST['id'];
            $medico_id = $_POST['medico_id'];
            $paciente_id = $_POST['paciente_id'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $valor = $_POST['valor'];
            $consultorio = $_POST['consultorio'];

            // Inicializa a conexão com o banco de dados
            $database = Database::getInstance();

            try {
                // Atualiza os dados da consulta
                Consulta::where('id', $id)->update([
                    'medico_id' => $medico_id,
                    'paciente_id' => $paciente_id,
                    'data' => $data,
                    'hora' => $hora,
                    'valor' => $valor,
                    'consultorio' => $consultorio
                ]);

                // Redireciona ou exibe uma mensagem de sucesso
                echo "Consulta atualizada com sucesso!";
            } catch (\Exception $e) {
                // Exibe mensagem de erro
                echo "Erro ao atualizar consulta: " . $e->getMessage();
            }
        } else {
            // Se não for um POST, redireciona para a lista de consultas
            header('Location: /consulta/listar');
            exit;
        }
    }

    public function cadastrarView()
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca todos os médicos e pacientes no banco de dados
        $medicos = Medico::all(); // ou Capsule::table('medicos')->get();
        $pacientes = Paciente::all(); // ou Capsule::table('pacientes')->get();

        // Envia os médicos e pacientes para a view
        include '../public/temp_view/consulta_form.php';
    }
}
