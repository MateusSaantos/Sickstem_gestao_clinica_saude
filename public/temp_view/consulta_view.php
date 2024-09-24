<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Consulta</title>
</head>
<body>

    <h1>Detalhes da Consulta</h1>
    <p><strong>Médico:</strong> <?= $consulta->medico->nome ?></p>
    <p><strong>Paciente:</strong> <?= $consulta->paciente->nome_completo ?></p>
    <p><strong>Data:</strong> <?= $consulta->data ?></p>
    <p><strong>Hora:</strong> <?= $consulta->hora ?></p>
    <p><strong>Valor:</strong> R$ <?= number_format($consulta->valor, 2, ',', '.') ?></p>
    <p><strong>Consultório:</strong> <?= $consulta->consultorio ?></p>

    <a href="/consulta/editar_view/<?= $consulta->id ?>">Editar Consulta</a>

</body>
</html>
