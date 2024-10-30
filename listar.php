<?php
include("sessao.php");
include("topo.php");
$conexao = mysqli_connect('localhost','root','','projetofinal');
$sql = "SELECT * FROM ticket";
$executar = mysqli_query($conexao, $sql);
echo "<table border='1'><tr><th>Id</th><th>Nome</th>
<th>Quantidade</th><th>Valor</th><th>Apagar</th>
<th>Atualizar</th></tr>";
while($resultado = mysqli_fetch_array($executar)){
    $idTicket = $resultado['idTicket'];
    $data_compra = $resultado['data_compra'];
    $data_visita = $resultado['data_visita'];
    $quantidade = $resultado['quantidade'];
    $preco = $resultado['preco'];
    $desconto = $resultado['desconto'];
    $tipo_ingresso = $resultado['tipo_ingresso'];
    echo "<tr><td>$idTicket</td><td>$tipo_ingresso</td><td>$quantidade</td>
    <td>$preco</td><td><a href='del_prod.php?id=$idTicket'>Remover</a></td>
    <td><a href='upd_prod.php?id=$idTicket'>Atualizar</a></td></tr>";
}
echo "</table>";
$fechar = mysqli_close($conexao);

include('final.html');

?>