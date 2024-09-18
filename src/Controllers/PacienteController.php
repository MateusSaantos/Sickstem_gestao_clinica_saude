<?php

namespace App\Controllers;
use App\Database\Database;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Paciente;

class PacienteController
{
    public function cadastrar()
    {
        // Verifica se o método é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $nome_completo = $_POST['nome_completo'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $sexo = $_POST['sexo'];
            $telefone = $_POST['telefone'];
            $nome_mae = $_POST['nome_mae'];
            $nome_responsavel = $_POST['nome_responsavel'];
            $telefone_responsavel = $_POST['telefone_responsavel'];
            $convenio = $_POST['convenio'];
            $plano_saude = $_POST['plano_saude'];

            // Inicializa a conexão com o banco de dados
            $database = Database::getInstance();

            try {
                // Insere o paciente no banco de dados
                Capsule::table('paciente')->insert([
                    'nome_completo' => $nome_completo,
                    'cpf' => $cpf,
                    'data_nascimento' => $data_nascimento,
                    'sexo' => $sexo,
                    'telefone' => $telefone,
                    'nome_mae' => $nome_mae,
                    'nome_responsavel' => $nome_responsavel,
                    'telefone_responsavel' => $telefone_responsavel,
                    'convenio' => $convenio,
                    'plano_saude' => $plano_saude
                ]);

                // Redireciona para uma página de sucesso ou exibe uma mensagem
                echo "Paciente cadastrado com sucesso!";
            } catch (\Exception $e) {
                // Exibe mensagem de erro
                echo "Erro ao cadastrar paciente: " . $e->getMessage();
            }
        } else {
            // Se não for um POST, redireciona para o formulário
            header('Location: /temp_view/paciente_form.php');
            exit;
        }
    }

    public function listarPacientes()
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();

        // Busca todos os pacientes no banco de dados
        $pacientes = Capsule::table('paciente')->get();

        // Converte para array
        $pacientesArray = $pacientes->toArray();

        print_r($pacientesArray);

        // Envia os pacientes para a view
        require_once '../public/temp_view/pacientes_list.php';
    }

    // Visualizar paciente
    public function visualizar($id) {
    // Garantir que o Capsule está configurado
    $database = Database::getInstance();
    
    // Encontrar o paciente
    $paciente = Paciente::find($id);
    
    if ($paciente) {
        // Incluir a view com os dados do paciente
        include '../public/temp_view/paciente_view.php';
        } else {
        echo "Paciente não encontrado.";
        }
    }

    // Editar paciente
    // Método para exibir o formulário de edição
    public function editar($id)
    {
        // Inicializa a conexão com o banco de dados
        $database = Database::getInstance();
        
        // Busca o paciente pelo ID
        $paciente = Paciente::find($id);
        
        // Verifica se o paciente foi encontrado
        if ($paciente) {
            // Inclui a view com o formulário de edição
            include '../public/temp_view/paciente_edit.php';
        } else {
            // Paciente não encontrado
            echo "Paciente não encontrado.";
        }
    }

    public function atualizar()
    {
        // Verifica se o método é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $id = $_POST['id'];
            $nome_completo = $_POST['nome_completo'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $sexo = $_POST['sexo'];
            $telefone = $_POST['telefone'];
            $nome_mae = $_POST['nome_mae'];
            $nome_responsavel = $_POST['nome_responsavel'];
            $telefone_responsavel = $_POST['telefone_responsavel'];
            $convenio = $_POST['convenio'];
            $plano_saude = $_POST['plano_saude'];

            // Inicializa a conexão com o banco de dados
            $database = Database::getInstance();

            try {
                // Atualiza os dados do paciente
                Paciente::where('id', $id)->update([
                    'nome_completo' => $nome_completo,
                    'cpf' => $cpf,
                    'data_nascimento' => $data_nascimento,
                    'sexo' => $sexo,
                    'telefone' => $telefone,
                    'nome_mae' => $nome_mae,
                    'nome_responsavel' => $nome_responsavel,
                    'telefone_responsavel' => $telefone_responsavel,
                    'convenio' => $convenio,
                    'plano_saude' => $plano_saude
                ]);

                // Redireciona para a lista de pacientes ou exibe uma mensagem de sucesso
                echo "Paciente atualizado com sucesso!";
            } catch (\Exception $e) {
                // Exibe mensagem de erro
                echo "Erro ao atualizar paciente: " . $e->getMessage();
            }
        } else {
            // Se não for um POST, redireciona para a lista de pacientes
            header('Location: /paciente/listar');
            exit;
        }
    }
}
