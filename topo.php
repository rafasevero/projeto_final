<?php
include('sessao.php');
?>
<html>
<head>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="main">
        <nav class="navbar">
            <div class="icon">
            <img src="img/logo.png" alt="BC World Logo" class="logo">
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
                            <li><a href="catalogo.html">ATRAÇÕES</a>
                            <li><a href="ver_tickets.php">COMPRAR</a></li>
                            <li><a href="add_carrinho.php">CARRINHO</a></li>
                        <?php } ?>
                        <li><a href='logout.php'>SAIR</a></li>
                    <?php } else { ?>
                        <li><a href='home.html'>Logar</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- Conteúdo Principal -->
        <div class="content">
            <h1>Beto Carrero <br><span>Onde a diversão</span> <br>não tem limites!</h1>
            <p class="par"> Com uma mistura emocionante de montanhas-russas, shows incríveis<br> e áreas temáticas fascinantes, oferece uma experiência de diversão e aventura<br> para toda a família em um ambiente mágico e inesquecível.</p>
            <button class="cn"><a href="https://www.betocarrero.com.br/">Saiba mais </a></button>
        </div>
    </div>
</body>
</html>