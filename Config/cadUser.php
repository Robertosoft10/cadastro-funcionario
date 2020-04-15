<?php
session_start();
require_once 'conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$nivel = $_POST['nivel'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$consult = mysqli_query($conexao, $sql);
$result = mysqli_num_rows($consult);
if($result > 0){
	
$_SESSION['userExiste'] = "Já tem um usuário usando esse e-mail";
header('location: /../cadastro-funcionario/config.php');

}else{
$sql = "INSERT INTO usuarios (nome, email, senha, nivel)VALUES('$nome', '$email', '$senha', '$nivel')";
$insert = mysqli_query($conexao, $sql);
$_SESSION['userok'] = "Usuário cadastrado com sucesso";
header('location: /../cadastro-funcionario/index.php');
}
?>