<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Paciente</title>
</head>
<body>
    <h1>Detalhes do Paciente</h1>
    <p><strong>Nome Completo:</strong> <?= htmlspecialchars($paciente->nome_completo) ?></p>
    <p><strong>CPF:</strong> <?= htmlspecialchars($paciente->cpf) ?></p>
    <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($paciente->data_nascimento) ?></p>
    <p><strong>Sexo:</strong> <?= htmlspecialchars($paciente->sexo === 'M' ? 'Masculino' : 'Feminino') ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($paciente->telefone) ?></p>
    <p><strong>Nome da Mãe:</strong> <?= htmlspecialchars($paciente->nome_mae) ?></p>
    <p><strong>Nome do Responsável:</strong> <?= htmlspecialchars($paciente->nome_responsavel) ?></p>
    <p><strong>Telefone do Responsável:</strong> <?= htmlspecialchars($paciente->telefone_responsavel) ?></p>
    <p><strong>Convênio:</strong> <?= htmlspecialchars($paciente->convenio) ?></p>
    <p><strong>Plano de Saúde:</strong> <?= htmlspecialchars($paciente->plano_saude) ?></p>

    <a href="/paciente/editar?id=<?= htmlspecialchars($paciente->id) ?>">Editar Paciente</a>
    <a href="/paciente/listar">Voltar à Lista</a>
</body>
</html>
