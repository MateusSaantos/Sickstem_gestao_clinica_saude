<?php
require '../vendor/autoload.php'; // Certifique-se de ajustar o caminho se necessário
require '../src/routes.php'; // Inclui o arquivo de rotas

use App\Database\Database;

$database = Database::getInstance();

