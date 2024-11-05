    <?php
    session_start();
    include('sessao.php');

    $con = mysqli_connect('localhost', 'root', '', 'projetofinal');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Obter a data de nascimento do usuário logado
    $idCliente = $_SESSION['idCliente'];
    $sqlUser = "SELECT data_nascimento FROM cliente WHERE idCliente = $idCliente";
    $resUser = mysqli_query($con, $sqlUser);
    $dataNascimento = mysqli_fetch_assoc($resUser)['data_nascimento']; // Exemplo: 'YYYY-MM-DD'

    $sql = "SELECT * FROM ticket ORDER BY tipo_ingresso ASC";
    $exe = mysqli_query($con, $sql);

    echo "
    <html>
        <head>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'>
        </head>
    </html>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(../projeto_final/fundo.jpg);
            background-size: 100%;
            margin: 0;
            padding: 0;
        }

        .title {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-top: 20px;
        }

        .tickets-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .ticket-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
        }

        .ticket-card:hover {
            transform: scale(1.05);
        }

        .ticket-title {
            font-size: 1.5rem;
            color: #555;
            margin-bottom: 10px;
        }

        .ticket-price, .ticket-discount {
            font-size: 1rem;
            color: #777;
            margin: 5px 0;
        }

        .ticket-price {
            color: #333;
            font-weight: bold;
        }

        .add-cart-btn {
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            margin-top: 15px;
        }

        .add-cart-btn a {
            color: #fff;
            text-decoration: none;
        }

        .add-cart-btn:hover {
            background-color: #0056b3;
        }
        .back-button {
    position: absolute;
    top: 20px;   /* distância do topo */
    left: 20px;  /* distância da esquerda */
    z-index: 1000; /* garante que o botão fique acima de outros elementos */
}

.back-link {
    color: #007BFF;
    font-size: 1.5rem; /* tamanho do ícone */
    transition: color 0.2s;
    text-decoration: none;
}

.back-link:hover {
    color: #0056b3;
}

    </style>";

    echo "<h1 class='title'>Escolha seus ingressos</h1>";
    echo "<div class='tickets-container'>";

    while ($res = mysqli_fetch_array($exe)) {
        $idTicket = $res['idTicket'];
        $tipo_ingresso = $res['tipo_ingresso'];
        $preco = $res['preco'];
        $desconto = $res['desconto'];
        $data_visita = $res['data_visita'];

        echo "
        <div class='ticket-card'>
            <form action = 'add_carrinho.php' method='get'>
            <h2 class='ticket-title'>Ingresso - $tipo_ingresso</h2>
            <p class='ticket-price' data-preco='$preco'>Preço: R$ $preco</p>
            <p class='ticket-discount'>Desconto: R$ $desconto</p>
            <label>Data da visita:</label>
            <input type='date' class='data-visita' name='data_visita')>
            <input type='hidden' name='idTicket' value='$idTicket'>            
                <input class='add-cart-btn' type='submit' value='Adicionar ao Carrinho'>
            </form>
        </div>
        <div class='back-button'>
            <a href='inicial.php' class='back-link'><i class='fas fa-arrow-left'></i></a>
        </div>;
        ";
    }

    echo "</div>";
    mysqli_close($con);
    ?>


