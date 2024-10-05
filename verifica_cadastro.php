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

// Receber nome de login via AJAX
$nomeLogin = $_POST['nomeLogin'];

// Verificar se o nome de login já existe no banco de dados
$sql = "SELECT * FROM usuario WHERE nomeLogin = '$nomeLogin'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Nome de login já existe
    echo 'emuso';
} else {
    // Nome de login está disponível
    echo 'disponivel';
}

// Fechar conexão
$conn->close();
?>
