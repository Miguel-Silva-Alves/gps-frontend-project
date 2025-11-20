<?php
session_start();
if ($_SESSION['role'] !== 'manager') exit("Acesso negado.");

include_once("config.php");

$nome = $_POST['nome'];
$url = $_POST['url'];
$valor = $_POST['valor'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];

$sql = "INSERT INTO quadras (nome, url, valor, horario_inicio, horario_fim)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssdss", $nome, $url, $valor, $inicio, $fim);
$stmt->execute();

header("Location: home.php");
exit();
?>