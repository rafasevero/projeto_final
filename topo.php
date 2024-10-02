<html>
  <head>
    <style>
	  body{color:blue; background-color:yellow;}
	  p{color:red; background-color:white;}
	  h1{color:orange; background-color:black;}
	  ul{list-style:none; text-align:center;}
	  li{display:inline-block;}
	  a,a:visited{color:black;font-size:20px;text-decoration:none;border:1px solid black;border-radius:5px;margin:5px;padding:5px;}
	  a:hover{color:yellow;font-size:20px;background-color:black;}
	</style>
  </head>
  <body>
    <ul>
	  <li><a href="home.html">Home</a></li>
	  <?php
	  if(isset($_SESSION['adm'])){ 
	    if($_SESSION['adm'] == 1){
	  ?>
	      <li><a href="cadastroProd.html">Cadastrar Produtos</a></li>
	      <li><a href="listar.php">Gerenciar Produtos</a></li>
	  <?php
	    }
		else{
	  ?>
	  <li><a href="ver_produtos.php">Comprar</a></li>
	  <li><a href="carrinho.php">Carrinho</a></li>
	  <?php
	    }
		echo "<li><a href='logout.php'>Sair</a></li>";
	  }
	  else{
		echo "<li><a href='home.html'>Logar</a></li>";
	  }
	  ?>
	  
	</ul>