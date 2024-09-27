<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Consulta</title>
</head>
<body>

    <h1>Detalhes da Consulta</h1>
    <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($consulta->data)) ?></p>
    <p><strong>Hora:</strong> <?= date('H:i', strtotime($consulta->hora)) ?></p>
    <p><strong>Valor:</strong> R$ <?= number_format($consulta->valor, 2, ',', '.') ?></p>
    <p><strong>Consultório:</strong> <?= $consulta->consultorio ?></p>
    <p><strong>Médico:</strong> <?= $consulta->medico_nome ?></p>
    <p><strong>Paciente:</strong> <?= $consulta->paciente_nome ?></p>

    <a href="/consulta/editar_view/<?= $consulta->id ?>">Editar Consulta</a>

</body>
</html>
