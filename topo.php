<html>
<head>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="main">
        <nav class="navbar">
            <div class="icon">
                <h2 class="logo">BC World</h2>
            </div>
            <div class="menu">
                <ul>
                    <?php if (isset($_SESSION['adm'])) { ?>
                        <?php if ($_SESSION['adm'] == 1) { ?>
                            <li><a href="home2.html">HOME</a></li>
                            <li><a href="cadastroProd.html">Cadastrar Ingresso</a></li>
                            <li><a href="listar.php">Gerenciar Ingresso</a></li>
                        <?php } else { ?>
                            <li><a href="home2.html">HOME</a></li>
                            <li><a href="ver_tickets.php">Comprar</a></li>
                            <li><a href="add_carrinho.php">Carrinho</a></li>
                        <?php } ?>
                        <li><a href='logout.php'>SAIR</a></li>
                    <?php } else { ?>
                        <li><a href='home.html'>Logar</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>
