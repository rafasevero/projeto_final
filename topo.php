<html>
  <head>
  <Link rel="stylesheet" href="home.css">

  </head>
  <body>
  <div class="main">
    <nav class="navbar">
        <div class="icon">
            <h2 class="logo">BC World</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="home.html">HOME</a></li>

                <?php if (isset($_SESSION['adm'])): ?>
                    <?php if ($_SESSION['adm'] == 1): ?>
                        <li><a href="cadastroProd.html">Cadastrar Ingresso</a></li>
                        <li><a href="listar.php">Gerenciar Ingresso</a></li>
                    <?php else: ?>
                        <li><a href="ver_produtos.php">Comprar</a></li>
                        <li><a href="carrinho.php">Carrinho</a></li>
                    <?php endif; ?>
                    <li><a href='logout.php'>Sair</a></li>
                <?php else: ?>
                    <li><a href='home.html'>Logar</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>