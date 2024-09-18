<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Editar Paciente</h1>
    <form action="/paciente/editar" method="POST">
        <input type="hidden" name="id" value="<?= $paciente->id ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" value="<?= $paciente->nome_completo ?>" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?= $paciente->cpf ?>" required><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $paciente->data_nascimento ?>" required><br>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="M" <?= $paciente->sexo == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $paciente->sexo == 'F' ? 'selected' : '' ?>>Feminino</option>
        </select><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= $paciente->telefone ?>" required><br>

        <label for="nome_mae">Nome da Mãe:</label>
        <input type="text" id="nome_mae" name="nome_mae" value="<?= $paciente->nome_mae ?>" required><br>

        <label for="nome_responsavel">Nome do Responsável:</label>
        <input type="text" id="nome_responsavel" name="nome_responsavel" value="<?= $paciente->nome_responsavel ?>" required><br>

        <label for="telefone_responsavel">Telefone do Responsável:</label>
        <input type="text" id="telefone_responsavel" name="telefone_responsavel" value="<?= $paciente->telefone_responsavel ?>" required><br>

        <label for="convenio">Convênio:</label>
        <input type="text" id="convenio" name="convenio" value="<?= $paciente->convenio ?>" required><br>

        <label for="plano_saude">Plano de Saúde:</label>
        <input type="text" id="plano_saude" name="plano_saude" value="<?= $paciente->plano_saude ?>" required><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
