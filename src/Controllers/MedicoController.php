<?php

namespace App\Controllers;

use App\Database\Database;
use Illuminate\Database\Capsule\Manager as Capsule;

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
}
