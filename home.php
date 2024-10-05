<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirecionar para login se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <DIV class="container">
    <h1>Bem-vindo, <?php echo $_SESSION['nomeLogin']; ?>!</h1>
    <h3>Você está logado com sucesso.</h3>
    <a href="logout.php"><button class="button">Sair</button></a>
    </DIV>
</body>
</html>
