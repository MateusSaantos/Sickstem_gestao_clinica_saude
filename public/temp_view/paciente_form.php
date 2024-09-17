<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
</head>
<body>
    <h1>Cadastro de Paciente</h1>
    <form action="processar_cadastro.php" method="POST">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br>

        <label for="nome_mae">Nome da Mãe:</label>
        <input type="text" id="nome_mae" name="nome_mae" required><br>

        <label for="nome_responsavel">Nome do Responsável:</label>
        <input type="text" id="nome_responsavel" name="nome_responsavel" required><br>

        <label for="telefone_responsavel">Telefone do Responsável:</label>
        <input type="text" id="telefone_responsavel" name="telefone_responsavel" required><br>

        <label for="convenio">Convênio:</label>
        <input type="text" id="convenio" name="convenio" required><br>

        <label for="plano_saude">Plano de Saúde:</label>
        <input type="text" id="plano_saude" name="plano_saude" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
