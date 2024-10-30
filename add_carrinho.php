<?php
session_start();
include('sessao.php');

$con = mysqli_connect('localhost', 'root', '', 'projetofinal');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['idTicket']) && isset($_SESSION['idCliente'])) {
    $idTicket = $_GET['idTicket'];
    $idCliente = $_SESSION['idCliente'];

    // Adicionar o ingresso ao carrinho
    $sql = "INSERT INTO sales (idCliente, idTicket) VALUES ('$idCliente', '$idTicket')";
    mysqli_query($con, $sql);
}

mysqli_close($con);
header("Location: ver_carrinho.php");
exit;
?>
