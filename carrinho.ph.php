<?php
include('sessao.php');
include('topo.php');
$idCliente = $_SESSION['idCliente'];
$con = mysqli_connect('localhost','root', '', 'projetofinal');
$sql = "select * from sales, ticket 
where sales.idCliente = $idCliente and sales.idTicket = ticket.idTicket";
$exe = mysqli_query($con, $sql);
$preco_total = 0;

while($res = mysqli_fetch_array($exe)){
	$idcar = $res['id_car'];
	$nome = $res['nome'];
	$valor = $res['valor'];
	$total += $valor;
	echo "<div>Produto: $nome Preço: $valor <a href='del_carrinho.php?id=$id_car'>Remover</a></div>";
}