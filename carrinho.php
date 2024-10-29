<?php
include('sessao.php');
include('topo.php');
$idCliente = $_SESSION['idCliente'];
$con = mysqli_connect('localhost','root', '', 'projetofinal');
$sql = "select * from sales, ticket 
where sales.idCliente = $idCliente and sales.idTicket = ticket.idTicket";
//$sql = "select * from carrinho, produtos where carrinho.id_cli = $id_cli and carrinho.id_prod=produtos.id";

$exe = mysqli_query($con, $sql);
$total = 0;

while($res = mysqli_fetch_array($exe)){
	$idSales = $res['idSales'];
	$data_compra = $res['data_compra'];
	$preco_total = $res['preco_total'];
	$total += $preco_total;
	$tipo_ingresso = $res['tipo_ingresso'];
	echo "<div>Tipo do ingresso: $tipo_ingresso Preço: $preco_total <a href='del_carrinho.php?id=$idSales'>Remover</a></div>";
}
echo"<div>O valor total é:<b> $total</b></div>";
echo "<div>&nbsp;</div><div><a href='ver_produtos.php'>Comprar mais</a></div>";
$fecha = mysqli_close($con);
include('final.html');
?>