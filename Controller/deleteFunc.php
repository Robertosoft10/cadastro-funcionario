<?php
session_start();
require_once '../Repositorio/classRepositFunc.php';
if(isset($_GET['idFunc'])){
$repositorio->deleteFunc($_REQUEST['idFunc']);

$_SESSION['funcDeletado'] = "Funcionário excluido com sucesso!";
header('Location: ../View/listar.php');
 }else{
$_SESSION['funcNaoDeletadoErro'] = "Erro! Funcionário não excluido";
header('Location: ../View/listar.php');
 }
?>
