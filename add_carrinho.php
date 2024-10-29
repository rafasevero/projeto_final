<?php
session_start();
include('sessao.php');
include('topo.php');

$con = mysqli_connect('localhost', 'root', '', 'projetofinal');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$idCliente = $_SESSION['idCliente'];
$sql = "SELECT sales.idSales, ticket.tipo_ingresso, ticket.preco 
        FROM sales 
        INNER JOIN ticket ON sales.idTicket = ticket.idTicket 
        WHERE sales.idCliente = $idCliente";
        
$exe = mysqli_query($con, $sql);
$total = 0;

echo "<h1>Seu Carrinho</h1>";
echo "<div class='cart-items'>";
while ($res = mysqli_fetch_array($exe)) {
    $idSales = $res['idSales'];
    $tipo_ingresso = $res['tipo_ingresso'];
    $preco = $res['preco'];
    $total += $preco;
    echo "<div>Tipo do ingresso: $tipo_ingresso - Preço: R$ $preco 
          <a href='del_carrinho.php?idSales=$idSales'>Remover</a></div>";
}
echo "</div>";
echo "<div>O valor total é: <b>R$ $total</b></div>";
echo "<div><a href='ver_carrinho.php'>Comprar mais</a></div>";

mysqli_close($con);
include('final.html');
?>
