<?php
session_start();
include_once '../Repositorio/classRepositUser.php';
if(!empty($_REQUEST['nome']) && !empty($_REQUEST['email']) && !empty($_REQUEST['senha']) && !empty($_REQUEST['nivel'])){
$objetoUser = new User(null, $_REQUEST['nome'], $_REQUEST['email'], sha1($_REQUEST['senha']) , $_REQUEST['nivel']);
$repositorio->insertUser($objetoUser);

$_SESSION['userAdd'] = "Usuário cadastrado com sucesso!";
header('location: ../View/usuarios.php');

}else{
header('location: ../View/usuarios.php');
$_SESSION['userAddErro'] = "Falha! Preencha os campos obrigatórios!";
}
 ?>
