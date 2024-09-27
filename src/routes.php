<?php
use App\Controllers\MedicoController;
use App\Controllers\PacienteController;
use App\Controllers\ConsultaController;

// Define as rotas
$routes = [
    '/' => function() {
        // Exibe a lista de pacientes e médicos
        $controller_paciente = new PacienteController();
        $controller_paciente->listarPacientes();
        
        $controller_medico = new MedicoController();
        $controller_medico->listarMedicos();

        $controller_consulta = new ConsultaController();
        $controller_consulta->listarConsultas();
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
    '/medico/cadastrar_view' => function() {
        include '../public/temp_view/medico_form.php'; // Página do formulário
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

    // Rotas para Consulta
    '/cadastrar_consulta' => function() {
        $controller = new ConsultaController();
        $controller->cadastrar();
    },
    '/consulta/cadastrar_view' => function() {
        $controller = new ConsultaController();
        $controller->cadastrarView(); // Página do formulário
    },
    '/consulta/visualizar_view/(\d+)' => function($id) {
        $controller = new ConsultaController();
        $controller->visualizar($id); // Passa o ID da consulta para o método visualizar
    },
    '/consulta/editar_view/(\d+)' => function($id) {
        $controller = new ConsultaController();
        $controller->editar($id); // Passa o ID da consulta para o método editar
    },
    '/consulta/atualizar/(\d+)' => function($id) {
        $controller = new ConsultaController();
        $controller->atualizar($id); // Passa o ID da consulta para o método atualizar
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
