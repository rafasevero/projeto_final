<?php
include('sessao.php');
$idTicket = $_POST['idTicket'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$desconto = $_POST['desconto'];
$tipo_ingresso = $_POST['tipo_ingresso'];
$conexao = mysqli_connect
('localhost','root','','projetofinal');
$sql = "update ticket set tipo_ingresso='$tipo_ingresso', quantidade=$quantidade,
preco=$preco where idTicket=$idTicket";
$executar = mysqli_query($conexao, $sql);
if($executar){
    header('location:listar.php');

}
else{
    echo "Erro";
}
$fechar = mysqli_close($conexao);
include('final.html');

?>