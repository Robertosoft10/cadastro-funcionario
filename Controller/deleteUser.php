<?php
session_start();
require_once '../Repositorio/classRepositUser.php';
if(isset($_GET['idUser'])){
$repositorio->deleteUser($_REQUEST['idUser']);

$_SESSION['userDeletado'] = "Usuário excluido com sucesso!";
header('Location: ../View/usuarios.php');
 }else{
$_SESSION['userNaoDeletadoErro'] = "Erro! Usuário não excluido";
header('Location: ../View/usuarios.php');
 }
?>
