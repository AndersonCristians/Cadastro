<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "#Cris2411";
$dbname = "usuarios";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber dados do formulário de cadastro
$nomeLogin = $_POST['nomeLogin'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];

// Inserir dados no banco de dados
$sql = "INSERT INTO usuario (nomeLogin, senha, nome, sobrenome) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nomeLogin, $senha, $nome, $sobrenome);
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
        
<?php
if ($stmt->execute()) {
    echo "<h1>Parabéns $nome!</h1> 
    <h3>seu login foi cadastrado com sucesso!</h3><br>;
     <a href=index.php><button class=button>Login</button></a>";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar conexão
$stmt->close();
$conn->close();
?>
    </div>
</body>
</html>
