<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">
        <form action="login.php" method="post">
            <h2>Saida Com sucesso!</h2><br>
            <input type="submit" class="button" value="Para fazer login novamente clique aqui">
        </form>
    </div>
</body>

</html>

<?php
session_start();
session_destroy(); // Destroi a sessão
header("Location: index.php"); // Redireciona para a página de login
exit();
?>
