<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Médico</title>
</head>
<body>

    <h1>Editar Médico</h1>

    <form action="/medico/editar" method="POST">
        <input type="hidden" name="id" value="<?= $medico->id ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $medico->nome ?>" required>

        <label for="crm">CRM:</label>
        <input type="text" id="crm" name="crm" value="<?= $medico->crm ?>" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?= $medico->cpf ?>" required>

        <label for="especialidade">Especialidade:</label>
        <input type="text" id="especialidade" name="especialidade" value="<?= $medico->especialidade ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= $medico->telefone ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $medico->email ?>">

        <label for="informacoes_extra">Informações Extras:</label>
        <textarea id="informacoes_extra" name="informacoes_extra"><?= $medico->informacoes_extra ?></textarea>

        <button type="submit">Atualizar Médico</button>
    </form>

</body>
</html>
