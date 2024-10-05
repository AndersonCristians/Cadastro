<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container">
    <h2>Cadastro de Usuário</h2>
    <form action="conecta.php" method="post">
        <label for="nomeLogin">Nome de Login:</label><br>
        <input type="text" class="inf" id="nomeLogin" name="nomeLogin" required><br><br>
        <span id="loginDisponivel"></span><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" class="inf" id="senha" name="senha" required><br><br>

        <label for="nome">Nome:</label><br>
        <input type="text" class="inf" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome:</label><br>
        <input type="text" class="inf" id="sobrenome" name="sobrenome" required><br><br>

        <input type="submit" class="button" value="Cadastrar">
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#nomeLogin').on('blur', function() {
                var nomeLogin = $(this).val();

                $.ajax({
                    url: 'verifica_login.php',
                    method: 'POST',
                    data: {nomeLogin: nomeLogin},
                    success: function(response) {
                        if(response == 'disponivel') {
                            $('#loginDisponivel').html('<span style="color: green;">Nome de login disponível.</span>');
                        } else {
                            $('#loginDisponivel').html('<span style="color: red;">Nome de login já está em uso.</span>');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
