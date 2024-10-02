<?php
include("sessao.php");
include('topo.php');
$data_visita = $_POST['data_visita'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$desconto = $_POST['desconto'];

$conexao = mysqli_connect
('localhost','root','','projetofinal');
$sql = "insert into ticket (data_visita, quantidade, preco, desconto)
values ($data_visita, $quantidade, '$preco', '$desconto')";
$executar = mysqli_query($conexao, $sql);

if($executar){
	echo "Produto cadastrado";
}
else{
	echo "erro ao cadastrar";
}

$fechar = mysqli_close($conexao);
include('final.html');

?>