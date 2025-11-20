<?php
$dbHost = 'db';
$dbUsername = 'user';
$dbPassword = 'senha';
$dbName = 'sistema_cadastro';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) {
    die("Erro ao conectar ao banco: " . $conexao->connect_error);
}
