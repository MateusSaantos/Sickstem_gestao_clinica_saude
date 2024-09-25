<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <title>Lista de Pacientes</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/paciente.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><img id="icon" src="../img/logo-icon.png" alt="logo"></i>Sickstem</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Página Inicial</a>
                <a href="about.html" class="nav-item nav-link">Sobre</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Consulta</a>
                    <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item">Cadastrar Consulta</a>
                        <a href="team.html" class="dropdown-item">Listar Consultas</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paciente</a>
                    <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item">Cadastrar Paciente</a>
                        <a href="team.html" class="dropdown-item">Listar Paciente</a>
                    </div>
                </div>
                <div class="nav-item dropdown"></div>
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Médico</a>
                <div class="dropdown-menu m-0">
                    <a href="price.html" class="dropdown-item">Cadastrar Médico</a>
                    <a href="team.html" class="dropdown-item">Listar Médicos</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contato</a>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="appointment.html" class="btn btn-primary py-2 px-4 ms-3">Login</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <h1>Lista de Pacientes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibe os pacientes na tabela
            foreach ($pacientesArray as $paciente) {
                echo "<tr>
                        <td>{$paciente->id}</td>
                        <td>{$paciente->nome_completo}</td>
                        <td>{$paciente->cpf}</td>
                        <td>{$paciente->data_nascimento}</td>
                        <td>{$paciente->telefone}</td>
                        <td>
                            <a href='/paciente/visualizar_view/{$paciente->id}'>Visualizar</a>
                            <a href='/paciente/editar_view/{$paciente->id}'>Editar</a>
                            <a href='/paciente/cadastrar_view'>Cadastrar</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
