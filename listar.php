<?php
include("sessao.php");
$conexao = mysqli_connect('localhost','root','','projetofinal');
$sql = "SELECT * FROM ticket";
$executar = mysqli_query($conexao, $sql);

// Estilos CSS para melhorar a aparência da tabela e da seta de retorno
echo "<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
    }
    .container {
        width: 80%;
        margin: 30px auto;
        background-color: #ffffff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th {
        background-color: #FF0084;
        color: white;
        padding: 10px;
        text-align: left;
    }
    td {
        padding: 10px;
        text-align: center;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    a {
        color: #4CAF50;
        text-decoration: none;
        font-weight: bold;
    }
    a:hover {
        color: #45a049;
    }
    
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url(../projeto_final/fundo.jpg) no-repeat center center fixed;
        background-size: cover;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 80px;
    }

    /* Navbar styling */
    .navbar {
        width: 100%;
        background-color: transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1000;
    }

    /* Estilo para a seta de retorno com Chevron */
    .back-arrow {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 1.5rem;
        color: #FF0084;
        display: flex;
        align-items: center;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s, transform 0.2s;
        z-index: 1001;
    }

    .back-arrow:hover {
        color: #ff3399;
        transform: translateX(-5px);
    }

    .back-arrow::before {
        content: '';
        border: solid #222;
        border-width: 0 4px 4px 0;
        display: inline-block;
        padding: 8px;
        margin-right: 8px;
        transform: rotate(135deg);
        transition: border-color 0.3s, transform 0.2s;
    }

    .back-arrow:hover::before {
        border-color: #ff3399;
        transform: rotate(135deg) translateX(-2px);
    }

    .icon .logo {
        width: 150px;
        height: auto;
    }

    .menu ul {
        list-style-type: none;
        display: flex;
        gap: 20px;
        margin: 0;
        padding: 0;
    }

    .menu ul li {
        display: inline;
    }

    .menu ul li a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        padding: 10px 15px;
        transition: color 0.3s, background-color 0.3s;
    }

    .menu ul li a:hover {
        color: #ff7200;
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }
</style>";

// Seta de retorno estilizada com Chevron
echo "<a href='inicial.php' class='back-arrow'></a>";

echo "<div class='navbar'>
        <div class='icon'>
            <img src='img/logo.png' alt='BC World Logo' class='logo'>
        </div>
      </div>";

echo "<div class='container'>";
echo "<h2>Gerenciamento de Ingressos</h2>";
echo "<table>
        <tr>
            <th>Id</th>
            <th>Tipo do Ingresso</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Apagar</th>
            <th>Atualizar</th>
        </tr>";

// Loop para exibir os dados de cada ticket
while($resultado = mysqli_fetch_array($executar)){
    $idTicket = $resultado['idTicket'];
    $data_compra = $resultado['data_compra'];
    $data_visita = $resultado['data_visita'];
    $quantidade = $resultado['quantidade'];
    $preco = $resultado['preco'];
    $desconto = $resultado['desconto'];
    $tipo_ingresso = $resultado['tipo_ingresso'];

    echo "<tr>
            <td>$idTicket</td>
            <td>$tipo_ingresso</td>
            <td>$quantidade</td>
            <td>R$ " . number_format($preco, 2, ',', '.') . "</td>
            <td><a href='del_prod.php?id=$idTicket'>Remover</a></td>
            <td><a href='upd_prod.php?id=$idTicket'>Atualizar</a></td>
         </tr>";
}
echo "</table>";
echo "</div>";

$fechar = mysqli_close($conexao);
include('final.html');
?>
