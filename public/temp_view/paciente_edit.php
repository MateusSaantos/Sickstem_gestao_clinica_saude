<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Editar Paciente</title>
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php include '../public/css/style.css'; ?>
        <?php include '../public/css/bootstrap.min.css'; ?>
        <?php include '../public/css/paciente.css'; ?>
    </style>

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/paciente.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-primary">Sickstem Administrativo</h1>
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

    <div id="areaCadastro" class="container d-flex justify-content-center align-items-center">
        <div class="row border rounded-5 p-3 bg-white shadow box-area mt-2">
            <!-- Caixa da Esquerda -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 ">
                        <h1>Editar Paciente</h1>
                        <form action="/paciente/editar" method="POST">
                            <input type="hidden" name="id" value="<?= $paciente->id ?>">

                            <label for="nome_completo">Nome Completo:</label>
                            <input type="text" id="nome_completo" name="nome_completo" value="<?= $paciente->nome_completo ?>" required><br>

                            <label for="cpf">CPF:</label><br>
                            <input type="text" id="cpf" name="cpf" value="<?= $paciente->cpf ?>" required><br>

                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $paciente->data_nascimento ?>" required><br>

                            <label for="sexo">Sexo:</label><br>
                            <select id="sexo" name="sexo" required>
                                <option value="M" <?= $paciente->sexo == 'M' ? 'selected' : '' ?>>Masculino</option>
                                <option value="F" <?= $paciente->sexo == 'F' ? 'selected' : '' ?>>Feminino</option>
                            </select><br>

                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" name="telefone" value="<?= $paciente->telefone ?>" required><br>

                            <label for="nome_mae">Nome da Mãe:</label>
                            <input type="text" id="nome_mae" name="nome_mae" value="<?= $paciente->nome_mae ?>" required><br>

                            <label for="nome_responsavel">Nome do Responsável:</label>
                            <input type="text" id="nome_responsavel" name="nome_responsavel" value="<?= $paciente->nome_responsavel ?>" required><br>

                            <label for="telefone_responsavel">Telefone do Responsável:</label>
                            <input type="text" id="telefone_responsavel" name="telefone_responsavel" value="<?= $paciente->telefone_responsavel ?>" required><br>

                            <label for="convenio">Convênio:</label>
                            <input type="text" id="convenio" name="convenio" value="<?= $paciente->convenio ?>" required><br>

                            <label for="plano_saude">Plano de Saúde:</label>
                            <input type="text" id="plano_saude" name="plano_saude" value="<?= $paciente->plano_saude ?>" required><br>

                            <input type="submit" class='btn btn-primary' value="Atualizar"><br><br>
                            <a href="/listar_pacientes" class='btn btn-primary'>Voltar à Lista</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Caixa da Direita -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4169E1;">
                <div class="featured-image mb-3">
                    <img id="paciente"  class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 mb-2">Edite seu paciente!</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Obtenha os dados dos seus pacientes de forma prática!</small>
            </div>
        </div>
    </div>
</body>

</html>