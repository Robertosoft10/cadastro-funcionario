<?php
session_start();
require_once '../Repositorio/classRepositUser.php';
$users = $repositorio->getListUser();
$destino = "../Controller/insertUser.php";
if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
    $user = $repositorio->requiestUser($idUser);
    $destino = "../Controller/udtateUser.php";
    $oculto = '<input type="hidden" name="idUser" value="'. $idUser .'" />';
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
        <div class="col-md-12 order-md-1">
          <?php if(isset($_SESSION['userAdd'])){?>
          <div class="alert alert-success">
          <?php echo $_SESSION['userAdd'];?>
            </div>
           <?php unset($_SESSION['userAdd']); } ?>
		   
            <?php if(isset($_SESSION['userAddErro'])){?>
            <div class="alert alert-danger">
            <?php echo $_SESSION['userAddErro'];?>
              </div>
              <?php unset($_SESSION['userAddErro']); } ?>
			  
			 <?php if(isset($_SESSION['userUdtate'])){?>
            <div class="alert alert-success">
            <?php echo $_SESSION['userUdtate'];?>
              </div>
              <?php unset($_SESSION['userUdtate']); } ?>
			  <?php if(isset($_SESSION['userUdtateerro'])){?>
            <div class="alert alert-success">
            <?php echo $_SESSION['userUdtateerro'];?>
              </div>
              <?php unset($_SESSION['userUdtateerro']); } ?>
			  
			  <?php if(isset($_SESSION['userDeletado'])){?>
            <div class="alert alert-success">
            <?php echo $_SESSION['userDeletado'];?>
              </div>
              <?php unset($_SESSION['userDeletado']); } ?>
			  <?php if(!isset($_GET['idUser'])){?>
                  <h4 class="mb-3">Cadastrar Usuário</h4>
				  <?php }else{?>
					 <h4 class="mb-3">Editar dados do  Usuário</h4>
					<?php } ?>
                  <form class="needs-validation" action=<?= $destino;?>  method="post">
				  <?= @$oculto; ?>
                    <div class="row">
                      <div class="col-md-9 mb-3">
                        <label for="primeiroNome">Usuário: *</label>
                        <input type="text" name="nome" class="form-control" id="primeiroNome"
						value="<?php echo isset($user)?$user->getNome():"";?>">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">E-mail: *</label>
                        <input type="email" name="email" class="form-control" id="primeiroNome"
						value="<?php echo isset($user)?$user->getEmail():"";?>">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">Senha: *</label>
                        <input type="password" name="senha" required="" class="form-control" id="primeiroNome">
                      </div>
					   <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Nível: *</label>
                        <select type="number" name="nivel"  required="" class="form-control" id="primeiroNome">
                 
						<option></option>
						<option value="1">Administrador</option>
						<option value="2">Usuário comum</option>
						</select>
					  </div>
                      </div>
                    <hr class="mb-4">
					<?php if(!isset($_GET['idUser'])){?>
                    <button class="btn btn-success col-md-4" type="submit">Salvar Cadastro</button>
					<?php }else{?>
					<button class="btn btn-success col-md-4" type="submit">Salvar Alterações</button>
					<?php } ?>
				 </form>
                </div>
              </div>
              <hr>
			  <h2>Lista de Usuários</h2>
		  <div class="col-md-12 order-md-1">
          <div class="table-responsive">
            <table class="table table-striped table-sm col-md-12" id="example">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Usuário</th>
                  <th>E-mail</th>
                  <th>Nível</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
			  <?php while($rows = array_shift($users)){ ?>
			  <tr>
                  <td><?php echo $rows->getIdUser();?></td>
                  <td><?php echo $rows->getNome();?></td>
                  <td><?php echo $rows->getEmail();?></td>
				  <?php if($rows->getNivel() == 1){
					  $nivel = "Admin";
				  }else{
					  $nivel = "Comum";
				  }
				  ?>
                  <td><?php echo $nivel;?></td>
                  <td>
				  <a href="usuarios.php?idUser=<?= $rows->getIdUser();?>">
				  <i id="icon-acao-edit" class="fa fa-edit"></i></a>
				  <a href="../Controller/deleteUser.php?idUser=<?= $rows->getIdUser();?>">
				  <i id="icon-acao-remove" class="fa fa-remove"></i></a>
				  </td>
                </tr>
			  <?php } ?>
              </tbody>
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
   $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
  </body>
</html>
