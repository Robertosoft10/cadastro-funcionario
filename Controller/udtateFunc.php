<?php
session_start();
include_once '../Repositorio/classRepositFunc.php';

$objetoFunc = new Func($_REQUEST['idFunc'], $_REQUEST['nome'], $_REQUEST['fone'], $_REQUEST['cargo'] , $_REQUEST['salario'], $_REQUEST['turno']);
$repositorio->updateFunc($objetoFunc);
if($repositorio == true){
$_SESSION['funcUdtate'] = "Dados atualizado com sucesso!";
header('location: ../View/listar.php');

}else{
header('location: ../View/listar.php');
$_SESSION['funcUdtateerro'] = "Falha! na atualização de dados!";
}
 ?>
