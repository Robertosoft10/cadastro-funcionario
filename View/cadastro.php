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
        <div class="col-md-12 order-md-1">
          <?php if(isset($_SESSION['funcAdd'])){?>
          <div class="alert alert-success">
          <?php echo $_SESSION['funcAdd'];?>
            </div>
           <?php unset($_SESSION['funcAdd']); } ?>
		   
            <?php if(isset($_SESSION['funcAddErro'])){?>
            <div class="alert alert-danger">
            <?php echo $_SESSION['funcAddErro'];?>
              </div>
              <?php unset($_SESSION['funcAddErro']); } ?>
			  <?php if(!isset($_GET['idFunc'])){?>
                  <h4 class="mb-3">Cadastrar Funcionário</h4>
				  <?php }else{?>
					 <h4 class="mb-3">Editar dados do  Funcionário</h4>
					<?php } ?>
                  <form class="needs-validation" action=<?= $destino;?>  method="post">
				  <?= @$oculto; ?>
                    <div class="row">
                      <div class="col-md-9 mb-3">
                        <label for="primeiroNome">Nome: *</label>
                        <input type="text" name="nome" class="form-control" id="primeiroNome"
						value="<?php echo isset($func)?$func->getNome():"";?>">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Telefone: *</label>
                        <input type="text" name="fone" class="form-control" id="primeiroNome"
						placeholder="xx xxxx-xxxx"
						value="<?php echo isset($func)?$func->getFone():"";?>">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">Cargo: *</label>
                        <input type="text" name="cargo" class="form-control" id="primeiroNome"
						value="<?php echo isset($func)?$func->getCargo():"";?>">
                      </div>
					   <div class="col-md-3 mb-3">
                        <label for="primeiroNome">salário: *</label>
                        <input type="number" name="salario" class="form-control" id="primeiroNome"
						placeholder="Apenas númerios" value="<?php echo isset($func)?$func->getSalario():"";?>">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Turno: *</label>
                        <select type="text" name="turno"  class="form-control" id="primeiroNome">
						<option><?php echo isset($func)?$func->getTurno():"";?></option>
						<option>Manhã</option>
						<option>Tarde</option>
						<option>Noite</option>
						<option>Manhã e Tarde</option>
						<option>Tarde e Noite</option>
						</select>
                      </div>
                      </div>
                    <hr class="mb-4">
					<?php if(!isset($_GET['idFunc'])){?>
                    <button class="btn btn-success col-md-4" type="submit">Salvar Cadastro</button>
					<?php }else{?>
					<button class="btn btn-success col-md-4" type="submit">Salvar Alterações</button>
					<?php } ?>
				 </form>
                </div>
              </div>
              <hr>
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
   $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
  </body>
</html>
