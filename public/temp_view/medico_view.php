<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Médico</title>
</head>
<body>

    <h1>Detalhes do Médico</h1>
    <p><strong>Nome:</strong> <?= $medico->nome ?></p>
    <p><strong>CRM:</strong> <?= $medico->crm ?></p>
    <p><strong>CPF:</strong> <?= $medico->cpf ?></p>
    <p><strong>Especialidade:</strong> <?= $medico->especialidade ?></p>
    <p><strong>Telefone:</strong> <?= $medico->telefone ?></p>
    <p><strong>Email:</strong> <?= $medico->email ?></p>
    <p><strong>Informações Extras:</strong> <?= $medico->informacoes_extra ?></p>

    <a href="/medico/editar_view/<?= $medico->id ?>">Editar Médico</a>

</body>
</html>
