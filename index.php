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
        <h2>Login</h2>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'senha') {
                echo "<p style='color: red;'>Senha incorreta!</p>";
            } elseif ($_GET['error'] == 'login') {
                echo "<p style='color: red;'>Nome de login não encontrado!</p>";
            }
        }
        ?>
        <form action="verifica_login.php" method="post">
            <label for="nomeLogin">Nome de Login:</label><br>
            <input type="text" class="inf" id="nomeLogin" name="nomeLogin" required><br><br>

            <label for="senha">Senha:</label><br>
            <input type="password" class="inf" id="senha" name="senha" required><br><br>
            <input type="submit" class="button" value="Login">
        </form>
        <form action="cadastro.php" method="post">
            <h5>Não tem Login?</h5>
            <input type="submit" class="button" value="Registrar">
        </form>
    </div>
</body>
</html>
