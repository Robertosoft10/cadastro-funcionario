<?php
session_start();
require_once '../Repositorio/classRepositFunc.php';
$funcs = $repositorio->getListFunc();
$destino = "../Controller/insertFunc.php";
if(isset($_GET['idFunc'])){
    $idFunc = $_GET['idFunc'];
    $func = $repositorio->requiestFunc($idFunc);
    $destino = "../Controller/udtateFunc.php";
    $oculto = '<input type="hidden" name="idFunc" value="'. $idFunc .'" />';
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cadastro Funcionário</title>

    <!-- Principal CSS do Bootstrap -->
        <link href="../Css/style.css" rel="stylesheet">
        <link href="../Css/carrosel.css" rel="stylesheet">
        <link href="../Css/stylecss.css" rel="stylesheet">
		<link href="../Css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Estilos customizados para esse template -->
  </head>
  <body>
  
    <header>
       <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="">CF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a id="link-top" class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="listar.php">Listar</a>
            </li>
			<?php if($_SESSION['nivel']== 1) {?>
            <li class="nav-item">
              <a id="link-top" class="nav-link disabled"  href="usuarios.php">Usuários</a>
            </li>
			<?php } ?>
          </ul>
		   <div class="form-inline mt-2 mt-md-0"   id="user-logado">
           Olá: <?php echo $_SESSION['nome'];?> <a id="link-top" class="nav-link disabled"  href="../Config/logout.php">Sair</a>
          </div>
          <form class="form-inline mt-2 mt-md-0" action="pesquisa.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="nome" placeholder="Pesquisar" required="" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>
      </nav>
    </header>
    <main role="main">
	<br><br>
     <hr>
      <div class="container marketing">
        <div class="row">
          <h2>Detalhe do Funcionário</h2>
		  <div class="col-md-12 order-md-1">
          <div class="table-responsive">
            <table class="table table-striped table-sm col-md-12" id="example">
			  <tr>
                  <td>Funcionário: <?php echo $func->getIdFunc();?></td>
				  </tr>
				  <tr>
                  <td>Funcionário: <?php echo $func->getNome();?></td>
				   </tr>
				  <tr>
                  <td>Telefone: <?php echo $func->getFone();?></td>
				   </tr>
				  <tr>
                  <td>Cargo: <?php echo $func->getCargo();?></td>
				   </tr>
				  <tr>
				   <td>Salário: R$ <?php echo number_format($func->getSalario(), 2, ',', '.');?></td>
				   </tr>
				    <td>Turno: <?php echo $func->getTurno();?></td>
				   </tr>
				   
                  <td id="btn-detalhe">
				  <a href="cadastro.php?idFunc=<?= $func->getIdFunc();?>">
				  <i id="icon-acao-edit" class="fa fa-edit"></i></a>
				  <a href="../Controller/deleteFunc.php?idFunc=<?= $func->getIdFunc();?>">
				  <i id="icon-acao-remove" class="fa fa-remove"></i></a>
				  </td>
                </tr>
            </table>
          </div>
        </main>
      </div>
    </div>
	</div><!-- /.container -->
      <!-- FOOTER -->
      <footer class="container">
        <p>&copy; RobertoSoft10. 2020 &middot;
      </footer>
    </main>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="../Css/jquery.js"></script>
    <script src="../Css/jquery02.js"></script>
    <script src="../Css/jquery03.js"></script>
    <script src="../Css/jquery04.js"></script>

    <script src="../Css/jqueryDatatables.js"></script>
    <script src="../Css/dataTables.js"></script>
    <script src="../Css/ajax.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  </body>
</html>
