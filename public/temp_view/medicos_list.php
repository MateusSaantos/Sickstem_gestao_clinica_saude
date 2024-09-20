<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Médicos</title>
</head>
<body>

    <h1>Lista de Médicos</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>CPF</th>
                <th>Especialidade</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibe os médicos na tabela
            foreach ($medicosArray as $medico) {
                echo "<tr>
                        <td>{$medico->id}</td>
                        <td>{$medico->nome}</td>
                        <td>{$medico->crm}</td>
                        <td>{$medico->cpf}</td>
                        <td>{$medico->especialidade}</td>
                        <td>{$medico->telefone}</td>
                        <td>
                            <a href='/medico/visualizar_view/{$medico->id}'>Visualizar</a>
                            <a href='/medico/editar_view/{$medico->id}'>Editar</a>
                            <a href='/cadastrar_medico'>Cadastrar</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
