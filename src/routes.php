<?php

use App\Controllers\MedicoController;
use App\Controllers\PacienteController;
use App\Models\Medico;

// Define as rotas
$routes = [
    '/' => function() {
        //include '../public/temp_view/paciente_form.php'; // Página do formulário
        $controller = new PacienteController();
        $controller->listarPacientes();
        //include '../public/temp_view/medico_form.php'; // Página do formulário
    },
    '/cadastrar_paciente' => function() {
        $controller = new PacienteController();
        $controller->cadastrar();
    },
    '/cadastrar_medico' => function() {
        $controller = new MedicoController();
        $controller->cadastrar();
    },
    '/paciente/cadastrar_view' => function() {
        include '../public/temp_view/paciente_form.php'; // Página do formulário
    },
    '/paciente/visualizar_view/(\d+)' => function($id) {
        $controller = new PacienteController();
        $controller->visualizar($id); // Passa o ID do paciente para o método visualizar
    },
    '/paciente/editar_view/(\d+)' => function($id) {
        $controller = new PacienteController();
        $controller->editar($id); // Passa o ID do paciente para o método editar
    },
    '/paciente/editar' => function() {
        $controller = new PacienteController();
        $controller->atualizar();
    },
];

// Obtém a URL solicitada
$requestUri = $_SERVER['REQUEST_URI'];

// Verifica se a URL corresponde a uma das rotas definidas
foreach ($routes as $route => $handler) {
    if (preg_match('~^' . $route . '$~', $requestUri, $matches)) {
        array_shift($matches); // Remove o primeiro elemento do array, que é a URL correspondente
        call_user_func_array($handler, $matches);
        exit;
    }
}

// Rota não encontrada
http_response_code(404);
echo "Página não encontrada.";