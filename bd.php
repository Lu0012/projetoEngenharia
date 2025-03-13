<?php
// Configurações do banco de dados
$host = "localhost"; // Host do banco de dados
$user = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "cadastro_clientes"; // Nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Coletar os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $cpf = $_GET['cpf'];
    $nome_cartao = $_GET['nomeCartao'];
    $numero_cartao = $_GET['numeroCartao'];
    $codigo_seguranca = $_GET['codigo'];
    $parcelas = $_GET['parcelas'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO compras (nome, email, telefone, cpf, nome_cartao, numero_cartao, codigo_seguranca, parcelas)
            VALUES ('$nome', '$email', '$telefone', '$cpf', '$nome_cartao', '$numero_cartao', '$codigo_seguranca', '$parcelas')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página de agradecimento
        header("Location: finalizar.html");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>