<?php
include("sessao.php");
include('topo.php');

$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$desconto = $_POST['desconto'];
$tipo_ingresso = $_POST['tipo_ingresso'];

// Conectar ao banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'projetofinal');

if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}

// Query para inserir os dados
$sql = "INSERT INTO ticket (quantidade, preco, desconto, tipo_ingresso) 
        VALUES ($quantidade, '$preco', '$desconto', '$tipo_ingresso')";

$executar = mysqli_query($conexao, $sql);

// Verificar se a execução foi bem-sucedida e redirecionar para a página de sucesso
if ($executar) {
    // Redireciona para a página de sucesso
    header("Location: product_success.html");
    exit(); // Encerra o script para evitar continuar a execução
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

// Fechar conexão com o banco de dados
mysqli_close($conexao);
?>
