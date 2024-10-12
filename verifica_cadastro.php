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

// Receber o nome de login enviado via AJAX
$nomeLogin = $_POST['nomeLogin'];

// Verificar se o nome de login já está em uso
$sql = "SELECT * FROM usuario WHERE nomeLogin = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nomeLogin);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "indisponivel"; // Nome de login já em uso
} else {
    echo "disponivel"; // Nome de login disponível
}

// Fechar conexão
$stmt->close();
$conn->close();
?>
