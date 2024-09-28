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

    // Busca todas as consultas com nomes dos médicos e pacientes
    $consultas = Capsule::table('consulta') // Corrigido o nome da tabela para 'consultas'
        ->join('medicos', 'consulta.medico_id', '=', 'medicos.id') // Corrigido o nome da tabela para 'medicos'
        ->join('paciente', 'consulta.paciente_id', '=', 'paciente.id') // Corrigido o nome da tabela para 'pacientes'
        ->select(
            'consulta.*',
            'medicos.nome as medico_nome', // Corrigido o nome da tabela para 'medicos'
            'paciente.nome_completo as paciente_nome' // Corrigido o nome da tabela para 'pacientes'
        )
        ->get();

    // Converte para array
    $consultasArray = $consultas->toArray();

    // Envia as consultas para a view
    require_once '../public/temp_view/consultas_list.php';
}

public function visualizar($id)
{
    // Inicializa a conexão com o banco de dados
    $capsule = Database::getInstance()->getCapsule(); // Acesse o Capsule

    // Busca a consulta pelo ID, incluindo os dados do médico e do paciente
    $consulta = $capsule::table('consulta as c')
        ->join('medicos as m', 'c.medico_id', '=', 'm.id')
        ->join('paciente as p', 'c.paciente_id', '=', 'p.id')
        ->select('c.*', 'm.nome as medico_nome', 'p.nome_completo as paciente_nome')
        ->where('c.id', $id)
        ->first(); // Utilize first() para obter um único resultado

    if ($consulta) {
        // Inclui a view com os dados da consulta
        include '../public/temp_view/consulta_view.php';
    } else {
        echo "Consulta não encontrada.";
    }
}


public function editar($id)
{
    // Inicializa a conexão com o banco de dados
    $database = Database::getInstance();

    // Busca a consulta pelo ID
    $consulta = Consulta::find($id);

    if ($consulta) {
        // Inclui a view de edição com os dados da consulta
        include '../public/temp_view/consulta_edit.php';
    } else {
        echo "Consulta não encontrada.";
    }
}

    // Método para atualizar uma consulta
    public function atualizar($id)
{
    $database = Database::getInstance();

    // Obtém os dados do formulário
    $consultorio = $_POST['consultorio'];
    $horario = $_POST['horario'];

    // Atualiza a consulta
    $consulta = Consulta::find($id);
    if ($consulta) {
        $consulta->consultorio = $consultorio;
        $consulta->hora = $horario;
        $consulta->save(); // Salva as alterações

        echo "Consulta atualizada com sucesso!";
        // Redirecionar ou incluir a view com a consulta atualizada
    } else {
        echo "Consulta não encontrada.";
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

    public function listarConsultasComDetalhes()
    {
        $database = Database::getInstance();
        // Obtem todas as consultas junto com os pacientes e médicos
        return Consulta::with(['paciente', 'medico'])->get();
    }
    
}
