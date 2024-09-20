<?php

use App\Controllers\MedicoController;
use App\Controllers\PacienteController;

// Define as rotas
$routes = [
    '/' => function() {
        // Exibe a lista de pacientes
        $controller_paciente = new PacienteController();
        $controller_paciente->listarPacientes();
        $controller_medico = new MedicoController();
        $controller_medico->listarMedicos();

    },
    // Rotas para Paciente
    '/cadastrar_paciente' => function() {
        $controller = new PacienteController();
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
    // Rotas para Médico
    '/cadastrar_medico' => function() {
        $controller = new MedicoController();
        $controller->cadastrar();
    },
    '/medico/visualizar_view/(\d+)' => function($id) {
        $controller = new MedicoController();
        $controller->visualizar($id); // Passa o ID do médico para o método visualizar
    },
    '/medico/editar_view/(\d+)' => function($id) {
        $controller = new MedicoController();
        $controller->editar($id); // Passa o ID do médico para o método editar
    },
    '/medico/editar' => function() {
        $controller = new MedicoController();
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
