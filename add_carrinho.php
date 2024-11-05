<?php
session_start();
include('sessao.php');

$data_nascimento = $_SESSION['data_nascimento'];
$data_visita = $_GET['data_visita'];
$datav = explode('-', $data_visita);
$mes = $datav[1];
$dia = $datav[2];   
$con = mysqli_connect('localhost', 'root', '', 'projetofinal');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['idTicket']) && isset($_SESSION['idCliente'])) {
    $idTicket = $_GET['idTicket'];
    $idCliente = $_SESSION['idCliente'];
    $data_nascimento = $_SESSION['data_nascimento'];
    $preco_total = $_GET['preco_total'];
    $tipo_ingresso = $_GET['tipo_ingresso'];

    $datav2 = explode('-', $data_nascimento);
    $mes2 = $datav2[1];
    $dia2 = $datav2[2];   
    //die("$mes $dia $mes2 $dia2 $idTicket");
    if($idTicket == 13){
        if($mes == $mes2 and $dia == $dia2){
        
            $sql = "INSERT INTO sales (idCliente, idTicket,preco_total,tipo_ingresso) VALUES ('$idCliente', '$idTicket', '$preco_total','$tipo_ingresso')";
            mysqli_query($con, $sql);
        }
        else{
            echo "Você não participa da promoção!";
        }
    }
    else{
        $sql = "INSERT INTO sales (idCliente, idTicket,preco_total,tipo_ingresso) VALUES ('$idCliente', '$idTicket', '$preco_total','$tipo_ingresso')";
        mysqli_query($con, $sql);
    }
}

mysqli_close($con);
header("Location: ver_carrinho.php");
exit;
?>
