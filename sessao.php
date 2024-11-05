<?php
// Verifica se a sessão já não está ativa antes de iniciar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $adm = $_SESSION['adm'];
    $data_nascimento = $_SESSION['data_nascimento'] ; // Armazenar a data de nascimento na sessão
}
 else {
    die("Usuário não autenticado!<a href='home.html'>Logar</a>");
}
?>
