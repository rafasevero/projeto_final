<?php
include('topo.php');
session_start();
$_SESSION['email'] = null;
session_destroy();
echo "Logout realizado com sucesso!<br><br><br>
<a href='home.html'>Entrar novamente</a>";
include('final.html');
?>