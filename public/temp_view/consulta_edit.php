<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
</head>
<body>

    <h1>Editar Consulta</h1>

    <form action="/consulta/atualizar/<?= $consulta->id ?>" method="POST">
        <input type="hidden" name="id" value="<?= $consulta->id ?>">

        <label for="sala">Consultorio:</label>
        <input type="text" id="consultorio" name="consultorio" value="<?= $consulta->sala ?>" required>

        <label for="horario">Horário:</label>
        <input type="time" id="horario" name="horario" value="<?= $consulta->hora ?>" required>

        <button type="submit">Atualizar Consulta</button>
    </form>

</body>
</html>
