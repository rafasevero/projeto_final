<?php
 //include("sessao.php");
// include('topo.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$data_nascimento = $_POST['data_nascimento'];

$conexao = mysqli_connect
('localhost','root','','projetofinal');
$sql = "insert into cliente (nome, email, telefone, senha,data_nascimento)
values ('$nome', '$email', '$telefone', '$senha','$data_nascimento')";
$executar = mysqli_query($conexao, $sql);

if($executar){
	session_start();
	echo "Usuário cadastrado com sucesso!";
	$_SESSION['email'] = $res['email'];
	$_SESSION['idCliente'] = $res['idCliente'];
	$_SESSION['adm'] = $res['adm'];
	$_SESSION['data_nascimento'] = $res['data_nascimento'];

	header('location:register_success.html');
}
else{
	echo "erro ao cadastrar";
}

$fechar = mysqli_close($conexao);

?>