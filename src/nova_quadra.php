<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'manager') {
    die("Acesso negado.");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Quadra</title>
</head>
<body>

<h1>Cadastrar nova quadra</h1>

<form action="salvar_quadra.php" method="POST">

    <input type="text" name="nome" placeholder="Nome da quadra" required><br><br>
    <input type="text" name="url" placeholder="URL da imagem"><br><br>
    <input type="number" step="0.01" name="valor" placeholder="Valor" required><br><br>
    <label>Início:</label>
    <input type="time" name="inicio" required><br><br>
    <label>Fim:</label>
    <input type="time" name="fim" required><br><br>

    <input type="submit" value="Salvar">

</form>

</body>
</html>
