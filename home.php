<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php"); // Redireciona se não estiver logado
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo $_SESSION['nomeLogin']; ?>!</h2>
        <p>Esta é a área restrita do usuário.</p>
        <a href="logout.php"><button class="button">Sair</button></a>
    </div>
</body>
</html>
