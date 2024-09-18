<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
</head>
<body>

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
