<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";  // Usuário do MySQL
$password = "#Cris2411";      // Senha do MySQL
$dbname = "usuarios";  // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
// Receber dados do formulário
$nomeLogin = $_POST['nomeLogin'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$senha = $_POST['senha'];

/*Senha com Criptografia
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);  // Hash da senha
*/


    // Inserir dados no banco de dados
    $sql = "INSERT INTO usuario (nomeLogin, senha, nome, sobrenome) 
        VALUES ('$nomeLogin', '$senha', '$nome', '$sobrenome')";


    if ($conn->query($sql) === TRUE) {

        echo "<h1>Parabéns $nome você foi cadastrado com sucesso!</h1>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

// Fechar conexão
$conn->close();
