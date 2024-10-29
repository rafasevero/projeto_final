<?php
include('sessao.php');
$conexao = mysqli_connect('localhost','root','','projetofinal');
$idTicket = $_GET['id'];
$sql = "DELETE FROM ticket WHERE idTicket=$idTicket";
echo $sql;
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
    echo "Deletado com sucesso!";
    header('location:listar.php');
}
else{
    echo "Erro!";
}
$fechar = mysqli_close($conexao);
include('final.html');
?>
