<?php
session_start();
include('sessao.php');

$con = mysqli_connect('localhost', 'root', '', 'projetofinal');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['idSales'])) {
    $idSales = $_GET['idSales'];

    // Remover o ingresso do carrinho
    $sql = "DELETE FROM sales WHERE idSales = '$idSales'";
    mysqli_query($con, $sql);
}

mysqli_close($con);
header("Location: ver_carrinho.php");
exit;
?>
