<?php
include('sessao.php');
include('topo.php');

$con = mysqli_connect('localhost', 'root', '', 'projetofinal');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM ticket ORDER BY tipo_ingresso ASC";
$exe = mysqli_query($con, $sql);

while ($res = mysqli_fetch_array($exe)) {
    $idTicket = $res['idTicket'];
    $data_compra = $res['data_compra'];
    $data_visita = $res['data_visita'];
    $quantidade = $res['quantidade'];
    $preco = $res['preco'];
	$desconto = $res['desconto'];
    $tipo_ingresso = $res['tipo_ingresso'];

    echo "
    <div class='ticket-options'>
        <div class='ticket'>
            <h2>Ingresso - $tipo_ingresso</h2>
            <p>Preço: R$$preco</p>
            <p>Desconto: R$$desconto</p>
            <button><a href='add_carrinho.php?idTicket=$idTicket'>Adicionar ao carrinho</a></button>
        </div>
    </div>
    ";
}

$fecha = mysqli_close($con);

include('final.html');
?>
