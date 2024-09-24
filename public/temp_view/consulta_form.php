<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Consulta</title>
</head>
<body>
    <h1>Cadastro de Consulta</h1>
    <form action="/cadastrar_consulta" method="POST">
        <label for="medico_id">Médico:</label>
        <select id="medico_id" name="medico_id" required>
            <!-- Substitua por uma lógica para buscar os médicos do banco de dados -->
            <option value="">Selecione o Médico</option>
            <?php
            // Exemplo de como carregar os médicos, ajuste conforme seu código.
            foreach ($medicos as $medico) {
                echo "<option value='{$medico->id}'>{$medico->nome}</option>";
            }
            ?>
        </select><br>

        <label for="paciente_id">Paciente:</label>
        <select id="paciente_id" name="paciente_id" required>
            <!-- Substitua por uma lógica para buscar os pacientes do banco de dados -->
            <option value="">Selecione o Paciente</option>
            <?php
            // Exemplo de como carregar os pacientes, ajuste conforme seu código.
            foreach ($pacientes as $paciente) {
                echo "<option value='{$paciente->id}'>{$paciente->nome_completo}</option>";
            }
            ?>
        </select><br>

        <label for="data">Data da Consulta:</label>
        <input type="date" id="data" name="data" required><br>

        <label for="hora">Hora da Consulta:</label>
        <input type="time" id="hora" name="hora" required><br>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" required><br>

        <label for="consultorio">Consultório:</label>
        <input type="text" id="consultorio" name="consultorio" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
