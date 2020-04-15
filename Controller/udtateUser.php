<?php
session_start();
include_once '../Repositorio/classRepositUser.php';

$objetoUser = new User($_REQUEST['idUser'], $_REQUEST['nome'], $_REQUEST['email'], sha1($_REQUEST['senha']), $_REQUEST['nivel']);
$repositorio->updateUser($objetoUser);
if($repositorio == true){
$_SESSION['userUdtate'] = "Dados atualizado com sucesso!";
header('location: ../View/usuarios.php');

}else{
header('location: ../View/usuarios.php');
$_SESSION['userUdtateerro'] = "Falha! na atualização de dados!";
}

 ?>
