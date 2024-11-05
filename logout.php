<?php
session_start(); // Inicia a sessão

// Remove todas as variáveis da sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login após o logout
header("Location: logout_success.php");
exit(); // Para garantir que o script pare aqui
?>