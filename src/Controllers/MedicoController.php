<?php

namespace App\Controllers;

use App\Database\Database;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Medico;

class MedicoController
{
    public function cadastrar()
    {
        // Verifica se o método é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $nome = $_POST['nome'];
            $crm = $_POST['crm'];
            $cpf = $_POST['cpf'];
            $especialidade = $_POST['especialidade'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $informacoes_extra = $_POST['informacoes_extra'];

            // Inicializa a conexão com o banco de dados
            $database = Database::getInstance();

            try {
                // Insere o médico no banco de dados
                Capsule::table('medicos')->insert([
                    'nome' => $nome,
                    'crm' => $crm,
                    'cpf' => $cpf,
                    'especialidade' => $especialidade,
                    'telefone' => $telefone,
                    'email' => $email,
                    'informacoes_extra' => $informacoes_extra
                ]);

                // Redireciona para uma página de sucesso ou exibe uma mensagem
                echo "Médico cadastrado com sucesso!";
            } catch (\Exception $e) {
                // Exibe mensagem de erro
                echo "Erro ao cadastrar médico: " . $e->getMessage();
            }
        } else {
            // Se não for um POST, redireciona para o formulário
            header('Location: /temp_view/medico_form.php');
            exit;
        }
    }

    public function listarMedicos(){
    // Inicializa a conexão com o banco de dados
    $database = Database::getInstance();

    // Busca todos os médicos no banco de dados
    $medicos = Capsule::table('medicos')->get();

    // Converte para array
    $medicosArray = $medicos->toArray();

    // Para depuração, exibe os médicos
    print_r($medicosArray);

    // Envia os médicos para a view
    require_once '../public/temp_view/medicos_list.php';
    }


    // Método para visualizar os detalhes de um médico
    public function visualizar($id)
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca o médico pelo ID
        $medico = Medico::find($id);

        if ($medico) {
            // Inclui a view com os dados do médico
            include '../public/temp_view/medico_view.php';
        } else {
            echo "Médico não encontrado.";
        }
    }

    // Método para exibir o formulário de edição de um médico
    public function editar($id)
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca o médico pelo ID
        $medico = Medico::find($id);

        // Verifica se o médico foi encontrado
        if ($medico) {
            // Inclui a view com o formulário de edição
            include '../public/temp_view/medico_edit.php';
        } else {
            // Médico não encontrado
            echo "Médico não encontrado.";
        }
    }

    // Método para atualizar os dados de um médico
    public function atualizar()
    {
        // Verifica se o método é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $crm = $_POST['crm'];
            $cpf = $_POST['cpf'];
            $especialidade = $_POST['especialidade'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $informacoes_extra = $_POST['informacoes_extra'];

            // Inicializa a conexão com o banco de dados
            $database = Database::getInstance();

            try {
                // Atualiza os dados do médico
                Medico::where('id', $id)->update([
                    'nome' => $nome,
                    'crm' => $crm,
                    'cpf' => $cpf,
                    'especialidade' => $especialidade,
                    'telefone' => $telefone,
                    'email' => $email,
                    'informacoes_extra' => $informacoes_extra
                ]);

                // Redireciona ou exibe uma mensagem de sucesso
                echo "Médico atualizado com sucesso!";
            } catch (\Exception $e) {
                // Exibe mensagem de erro
                echo "Erro ao atualizar médico: " . $e->getMessage();
            }
        } else {
            // Se não for um POST, redireciona para a lista de médicos
            header('Location: /medico/listar');
            exit;
        }
    }
}
