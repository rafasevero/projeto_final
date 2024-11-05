<?php
//die("erro");
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];
$conexao = mysqli_connect('localhost', 'root', '', 'projetofinal');

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Usar prepared statements para prevenir SQL injection
$sql = "SELECT * FROM cliente WHERE email = ? AND senha = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$res = mysqli_fetch_array($result);

if ($res) {
    $_SESSION['email'] = $res['email'];
    $_SESSION['idCliente'] = $res['idCliente'];
    $_SESSION['adm'] = $res['adm'];
    $_SESSION['data_nascimento'] = $res['data_nascimento']; // Armazenar a data de nascimento na sessão
    header('location:inicial.php');
} else {
    echo "Login e/ou senha incorretos!";
}

mysqli_close($conexao);
?>
