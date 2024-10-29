<?php
include('sessao.php');
$idTicket = $_GET['id'];
$conexao = mysqli_connect('localhost','root','','projetofinal');
$sql = "SELECT * FROM ticket WHERE idTicket=$idTicket";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
$fechar = mysqli_close($conexao);
?>
    <form action="atualizar.php" method="post">
        Id Ingresso <input type="text" name="idTicket"
        value="<?php echo $res['idTicket'];?>" readonly><br>
        Tipo do Ingresso <input type="text" name="tipo_ingresso"
        value="<?php echo $res['tipo_ingresso'];?>"><br>
        Quantidade <input type="text" name="quantidade"
        value="<?php echo $res['quantidade'];?>"><br>
        Preço <input type="text" name="preco"
        value="<?php echo $res['preco'];?>"><br>
        Desconto <input type="text" name="desconto"
        value="<?php echo $res['desconto'];?>"><br><br>
        <input type="submit">
    </form>
	<?php
include('final.html');?>