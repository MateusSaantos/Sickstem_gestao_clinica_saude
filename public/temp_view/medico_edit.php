<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Editar Médico</title>
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
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php include '../public/css/style.css'; ?>
        <?php include '../public/css/bootstrap.min.css'; ?>
        <?php include '../public/css/paciente.css'; ?>
    </style>

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/medico.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href=../../ class="navbar-brand p-0">
            <h1 class="m-0 text-primary"></i>Sickstem Administrativo</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href=../public/principal.html class="nav-item nav-link active">Página Inicial</a>
                <a href="#sobre" class="nav-item nav-link">Sobre</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Consulta</a>
                    <div class="dropdown-menu m-0">
                        <a href=/consulta/cadastrar_view class="dropdown-item">Cadastrar Consulta</a>
                        <a href=/listar_consultas class="dropdown-item">Listar Consultas</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paciente</a>
                    <div class="dropdown-menu m-0">
                        <a href=/paciente/cadastrar_view class="dropdown-item">Cadastrar Paciente</a>
                        <a href=/listar_pacientes class="dropdown-item">Listar Paciente</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Médico</a>
                    <div class="dropdown-menu m-0">
                        <a href="/medico/cadastrar_view" class="dropdown-item">Cadastrar Médico</a>
                        <a href="/listar_medicos" class="dropdown-item">Listar Médicos</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Relatórios</a>
                    <div class="dropdown-menu m-0">
                        <a href="/relatorios/consultas" class="dropdown-item">Detalhes de consultas</a>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="appointment.html" class="btn btn-primary py-2 px-4 ms-3">Login</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <div id="areaCadastro" class="container d-flex justify-content-center align-items-center">
        <div class="row border rounded-5 p-3 bg-white shadow box-area mt-2">
            <!-- Caixa da Esquerda -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 ">
                        <h1>Editar Médico</h1>

                        <form action="/medico/editar" method="POST">
                            <input type="hidden" name="id" value="<?= $medico->id ?>">

                            <label for="nome">Nome:</label><br>
                            <input type="text" id="nome" name="nome" value="<?= $medico->nome ?>" required><br>

                            <label for="crm">CRM:</label><br>
                            <input type="text" id="crm" name="crm" value="<?= $medico->crm ?>" required><br>

                            <label for="cpf">CPF:</label><br>
                            <input type="text" id="cpf" name="cpf" value="<?= $medico->cpf ?>" required><br>

                            <label for="especialidade">Especialidade:</label><br>
                            <input type="text" id="especialidade" name="especialidade" value="<?= $medico->especialidade ?>" required><br>

                            <label for="telefone">Telefone:</label><br>
                            <input type="text" id="telefone" name="telefone" value="<?= $medico->telefone ?>"><br>

                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" value="<?= $medico->email ?>"><br>

                            <label for="informacoes_extra">Informações Extras:</label><br>
                            <textarea id="informacoes_extra" name="informacoes_extra"><?= $medico->informacoes_extra ?></textarea><br>

                            <button id="botaoSalvar" class="btn btn-primary" type="submit">Atualizar Médico</button><br><br>
                            <a href="/listar_medicos" class='btn btn-primary'>Voltar à Lista</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Caixa da Direita -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4169E1;">
                <div class="featured-image mb-3">
                    <img id="medico" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 mb-2">Editar Médicos</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Gerencie os médicos da sua clínica!</small>
            </div>
        </div>
    </div>

</body>

</html>