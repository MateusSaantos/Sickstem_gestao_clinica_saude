<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login | Sickstem - Gestão da sua clínica de saúde</title>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

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
                <div class="nav-item dropdown"></div>
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Médico</a>
                <div class="dropdown-menu m-0">
                    <a href=/medico/cadastrar_view class="dropdown-item">Cadastrar Médico</a>
                    <a href=/listar_medicos class="dropdown-item">Listar Médicos</a>
                </div>
            </div>
            <a href="#">Relatório</a>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="#" class="btn btn-primary py-2 px-4 ms-3">Login</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Container principal -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Login Container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- Caixa da Esquerda -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img id="loginFoto" src="img/login.jpeg" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600; text-align: center;">Gerencie sua clínica</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Faça o controle de consultas, médicos e pacientes.</small>
            </div>
            <!-- Caixa da Direita -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 ">
                        <div class="text-center">
                            <img src="img/logo-icon.png" class="img-fluid" style="width: 180px;">
                        </div>
                        <h2>Login</h2>
                        <p>Faça login inserindo seus dados.</p>
                        <form action="pagina_inicial.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuário</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
                            </div><br>
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" name="senha">
                            </div>
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </form>
                        <br>
                        <!-- JavaScript Libraries -->
                        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                        <script src="lib/wow/wow.min.js"></script>
                        <script src="lib/easing/easing.min.js"></script>
                        <script src="lib/waypoints/waypoints.min.js"></script>
                        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
                        <script src="lib/tempusdominus/js/moment.min.js"></script>
                        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
                        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
                        <script src="lib/twentytwenty/jquery.event.move.js"></script>
                        <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

                        <!-- Template Javascript -->
                        <script src="js/main.js"></script>
</body>


</html>