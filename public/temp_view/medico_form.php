<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médico</title>
</head>
<body>
    <h1>Cadastro de Médico</h1>
    <form action="/cadastrar_medico" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="crm">CRM:</label>
        <input type="text" id="crm" name="crm" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>

        <label for="especialidade">Especialidade:</label>
        <input type="text" id="especialidade" name="especialidade" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br>

        <label for="informacoes_extra">Informações Extras:</label>
        <textarea id="informacoes_extra" name="informacoes_extra"></textarea><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
