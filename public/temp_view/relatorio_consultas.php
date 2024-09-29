<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Detalhes do Paciente</title>
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
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/css/paciente.css" rel="stylesheet">
</head>

<body>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href=../../ class="navbar-brand p-0">
            <h1 class="m-0 text-primary"></i>Sickstem Administrativo</h1>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">          
            </div>
        </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <br><br>
    <h1 class="m-0 text-primary" style="text-align: center;">Relatório detalhado de consultas</h1>
    <table border="1" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th>ID da Consulta</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Consultório</th>
            <th>Paciente</th>
            <th>Paciente CPF</th>
            <th>Médico</th>
            <th>CRM</th>
            <th>Especialidade</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($consultas as $consulta): ?>
            <tr>
                <td style="border: 1px solid #000;"><?= $consulta->id ?></td>
                <td style="border: 1px solid #000;"><?= date('d/m/Y', strtotime($consulta->data)) ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->hora ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->consultorio ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->paciente->nome_completo ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->paciente->cpf ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->medico->nome ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->medico->crm ?></td>
                <td style="border: 1px solid #000;"><?= $consulta->medico->especialidade ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
