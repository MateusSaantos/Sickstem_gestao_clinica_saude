<?php

use App\Controllers\MedicoController;
use App\Controllers\PacienteController;
use App\Models\Medico;

// Define as rotas
$routes = [
    '/' => function() {
        include '../public/temp_view/paciente_form.php'; // Página do formulário
        include '../public/temp_view/medico_form.php'; // Página do formulário
    },
    '/cadastrar_paciente' => function() {
        $controller = new PacienteController();
        $controller->cadastrar();
    },
    '/cadastrar_medico' => function() {
        $controller = new MedicoController();
        $controller->cadastrar();
    },
];

// Obtém a URL solicitada
$requestUri = $_SERVER['REQUEST_URI'];

// Verifica se a rota existe e a chama
if (array_key_exists($requestUri, $routes)) {
    $routes[$requestUri]();
} else {
    // Rota não encontrada
    http_response_code(404);
    echo "Página não encontrada.";
}
