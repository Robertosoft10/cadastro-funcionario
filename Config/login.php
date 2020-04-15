<?php
session_start();
include_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];
$descrypt = sha1($senha);

if (empty($email) || empty($senha))
{
  $_SESSION['loginVazio'] = "Informe o usuário e a senha";
  header('location: /../cadastro-funcionario/index.php');
  exit;
}

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$descrypt' LIMIT 1";
$executa = $conexao->query($sql);
$result = $executa->fetch_assoc();
if(empty($result)) {
  $_SESSION['loginIncorreto'] = "Usuário  ou senha invalidos!";
  header('location: /../cadastro-funcionario/index.php');
}else{

  $_SESSION['idUser'] = $result['idUser'];
  $_SESSION['nome'] = $result['nome'];
  $_SESSION['email'] = $result['email'];
  $_SESSION['senha'] = $result['senha'];
  $_SESSION['nivel'] = $result['nivel'];
  header('location: ../View/cadastro.php');
}
 ?>
