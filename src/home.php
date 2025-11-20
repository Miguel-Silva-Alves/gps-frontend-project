<?php
include_once('config.php');

$sql = "SELECT * FROM quadras";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/home.css">
    <title>Quadras</title>
</head>
<body>

<h1>Quadras disponíveis</h1>

<div class="quadras-container">

<?php while($q = $result->fetch_assoc()): ?>
    <div class="quadra-card">
        <h2><?php echo $q['nome']; ?></h2>
        <img src="<?php echo $q['url']; ?>" style="width:200px">
        <p><strong>Valor:</strong> R$ <?php echo $q['valor']; ?></p>
        <p><strong>Horário:</strong> <?php echo $q['horario_inicio']; ?> às <?php echo $q['horario_fim']; ?></p>
    </div>
<?php endwhile; ?>

</div>

</body>
</html>
