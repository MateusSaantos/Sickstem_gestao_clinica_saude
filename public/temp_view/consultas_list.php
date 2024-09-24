<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consultas</title>
</head>
<body>

    <h1>Lista de Consultas</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Médico</th>
                <th>Paciente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Valor</th>
                <th>Consultório</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibe as consultas na tabela
            foreach ($consultasArray as $consulta) {
                echo "<tr>
                        <td>{$consulta->id}</td>
                        <td>{$consulta->medico_nome}</td> <!-- Adapte conforme necessário -->
                        <td>{$consulta->paciente_nome}</td> <!-- Adapte conforme necessário -->
                        <td>{$consulta->data}</td>
                        <td>{$consulta->hora}</td>
                        <td>R$ {$consulta->valor}</td>
                        <td>{$consulta->consultorio}</td>
                        <td>
                            <a href='/consulta/visualizar_view/{$consulta->id}'>Visualizar</a>
                            <a href='/consulta/editar_view/{$consulta->id}'>Editar</a>
                            <a href='/consulta/cadastrar_view'>Cadastrar</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
