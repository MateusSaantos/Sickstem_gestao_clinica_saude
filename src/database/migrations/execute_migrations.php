<?php

require 'vendor/autoload.php';

use App\Database\Database;

// Inicializa a conexão com o banco de dados
$database = Database::getInstance();

// Lista de migrações a serem executadas
$migrations = [
    'src/database/migrations/2024_09_17_000002_create_pacientes_table.php',
    'src/database/migrations/2024_09_17_000002_create_medicos_table.php',
];

// Executa as migrações
foreach ($migrations as $migrationFile) {
    require $migrationFile;
    $migrationClass = basename($migrationFile, '.php');
    $migration = new $migrationClass();
    $migration->up(); // Chama o método 'up' para criar ou atualizar as tabelas
}

echo "Migrações executadas com sucesso!";
