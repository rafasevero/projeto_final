<?php
session_start();
include('sessao.php');

$con = mysqli_connect('localhost', 'root', '', 'projetofinal');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$idCliente = $_SESSION['idCliente'];

// Esvaziar o carrinho do cliente
$sql = "DELETE FROM sales WHERE idCliente = $idCliente";
mysqli_query($con, $sql);

// Destruir a sessão

// Redirecionar para a página de sucesso
header("Location: completed_success.html");
exit();

mysqli_close($con);
?>
