<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'projetofinal');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$idSales = $_GET['idSales'];
$sql = "DELETE FROM sales WHERE idSales = $idSales";

if (mysqli_query($con, $sql)) {
    header("Location: add_carrinho.php");
} else {
    echo "Erro ao remover do carrinho: " . mysqli_error($con);
}

mysqli_close($con);
?>
