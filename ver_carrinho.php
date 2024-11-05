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

echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'>";

echo "<style>
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

    .container {
        text-align: center;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 90%;
        max-width: 600px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .cart-icon {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
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

    .more-tickets,
    .finalizar-compra {
        display: block;
        margin-top: 20px;
        font-size: 1rem;
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    .more-tickets:hover,
    .finalizar-compra:hover {
        color: #0056b3;
    }
</style>";

echo "<div class='navbar'>
        <div class='icon'>
            <img src='img/logo.png' alt='BC World Logo' class='logo'>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='inicial.php'>HOME</a></li>
                <li><a href='https://www.betocarrero.com.br/'>SOBRE NÓS</a></li>
            </ul>
        </div>
      </div>";

echo "<div class='container'>";
echo "<i class='fas fa-shopping-cart cart-icon'></i>";
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
echo "<a href='finalizar_compra.php' class='finalizar-compra'>Finalizar Compra</a>"; // Botão para finalizar a compra
echo "</div>";

mysqli_close($con);
?>
