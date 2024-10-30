<?php
session_start();
include('sessao.php');

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

echo "<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url(../projeto_final/fundo.jpg) no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        text-align: center;
        background-color: rgba(255, 255, 255, 0.9); /* Translucent white background */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 90%;
        max-width: 600px;
    }

    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .cart-items {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .cart-item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-item p {
        margin: 0;
        color: #555;
        font-size: 1rem;
    }

    .remove-btn {
        color: #ff4d4d;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.2s;
    }

    .remove-btn:hover {
        color: #cc0000;
    }

    .total-price {
        font-size: 1.5rem;
        color: #333;
        margin-top: 20px;
    }

    .more-tickets {
        display: block;
        margin-top: 20px;
        font-size: 1rem;
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    .more-tickets:hover {
        color: #0056b3;
    }
</style>";

echo "<div class='container'>";
echo "<h1>Seu Carrinho</h1>";
echo "<div class='cart-items'>";

if (mysqli_num_rows($exe) > 0) {
    while ($res = mysqli_fetch_array($exe)) {
        $idSales = $res['idSales'];
        $tipo_ingresso = $res['tipo_ingresso'];
        $preco = $res['preco'];
        $total += $preco;

        echo "<div class='cart-item'>
                <p>Tipo do ingresso: $tipo_ingresso - Preço: R$ $preco</p>
                <a class='remove-btn' href='del_carrinho.php?idSales=$idSales'>Remover</a>
              </div>";
    }
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}

echo "</div>";
echo "<div class='total-price'>O valor total é: <b>R$ $total</b></div>";
echo "<a class='more-tickets' href='ver_tickets.php'>Comprar mais ingressos</a>";
echo "</div>";

mysqli_close($con);
?>
