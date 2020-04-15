<?php
session_start();
include_once '../Repositorio/classRepositFunc.php';
if(!empty($_REQUEST['nome']) && !empty($_REQUEST['fone']) && !empty($_REQUEST['cargo']) && !empty($_REQUEST['salario'])){
$objetoFunc = new Func(null, $_REQUEST['nome'], $_REQUEST['fone'], $_REQUEST['cargo'] , $_REQUEST['salario'], $_REQUEST['turno']);
$repositorio->insertFunc($objetoFunc);

$_SESSION['funcAdd'] = "Funcionário cadastrado com sucesso!";
header('location: ../View/cadastro.php');

}else{
header('location: ../View/cadastro.php');
$_SESSION['funcAddErro'] = "Falha! Preencha os campos obrigatórios!";
}
 ?>
