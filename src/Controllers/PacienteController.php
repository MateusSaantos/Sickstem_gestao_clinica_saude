<?php

namespace App\Controllers;

use App\Database\Database;
use Illuminate\Database\Capsule\Manager as Capsule;

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
}
