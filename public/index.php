<?php
require '../vendor/autoload.php'; // Certifique-se de ajustar o caminho se necessário

use App\Database\Database;

$database = Database::getInstance();

// Tente realizar uma consulta simples para verificar a conexão
try {
    $users = $database->getCapsule()->table('paciente')->get();
    echo "Conexão bem-sucedida! Pacientes encontrados: " . count($users);
} catch (\Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
