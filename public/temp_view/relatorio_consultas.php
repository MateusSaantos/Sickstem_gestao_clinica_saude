<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Consultas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Relatório de Consultas Marcadas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID da Consulta</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Consultório</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Especialidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $consulta->id ?></td>
                    <td><?= date('d/m/Y', strtotime($consulta->data)) ?></td>
                    <td><?= $consulta->hora ?></td>
                    <td><?= $consulta->consultorio ?></td>
                    <td><?= $consulta->paciente->nome_completo ?></td>
                    <td><?= $consulta->medico->nome ?></td>
                    <td><?= $consulta->medico->especialidade ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
