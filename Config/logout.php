<?php
session_destroy();
unset($_SESSION['email'],
	 $_SESSION['passoword']);

header('location: /../cadastro-funcionario/index.php');
exit;
?>
