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

// Receber dados do formulário de login
$nomeLogin = $_POST['nomeLogin'];
$senha_digitada = $_POST['senha'];

// Verificar se o nome de login existe
$stmt = $conn->prepare("SELECT * FROM usuario WHERE nomeLogin = ?");
$stmt->bind_param("s", $nomeLogin);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Se o usuário existe, pegar os dados
    $usuario = $resultado->fetch_assoc();

    // Verificar se a senha digitada corresponde à senha armazenada
    if (password_verify($senha_digitada, $usuario['senha'])) {
        // Login bem-sucedido
        session_start();
        $_SESSION['usuario_id'] = $usuario['idUsuario'];
        $_SESSION['nomeLogin'] = $usuario['nomeLogin'];
        $conn->close();
        header("Location: home.php");
        exit();
    } else {
        // Senha incorreta
        $conn->close();
        header("Location: index.php?error=senha"); // Redireciona para login com erro
        exit();
    }
} else {
    // Nome de login não encontrado
    $conn->close();
    header("Location: index.php?error=login"); // Redireciona para login com erro
    exit();
}
?>
