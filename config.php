<?php
session_start();
require_once 'Config/conexao.php';
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
        <link href="Css/style.css" rel="stylesheet">
        <link href="Css/carrosel.css" rel="stylesheet">
        <link href="Css/stylecss.css" rel="stylesheet">
		<link href="Css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
        </div>
      </nav>
    </header>
    <main role="main">
	<br><br>
     <hr>
      <div class="container marketing">
        <div class="row">
        <div class="col-md-12 order-md-1">
		   
            <?php if(isset($_SESSION['userExiste'])){?>
            <div class="alert alert-danger">
            <?php echo $_SESSION['userExiste'];?>
              </div>
              <?php unset($_SESSION['userExiste']); } ?>
                  <h4 class="mb-3">Cadastrar Usuário para acessar o sistema</h4>
                  <form class="needs-validation" action="Config/cadUser.php"  method="post">
                    <div class="row">
                      <div class="col-md-9 mb-3">
                        <label for="primeiroNome">Usuário: *</label>
                        <input type="text" name="nome" required="" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">E-mail: *</label>
                        <input type="email" name="email" required="" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">Senha: *</label>
                        <input type="password" name="senha" required="" required="" class="form-control" id="primeiroNome">
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
                    <button class="btn btn-success col-md-4" type="submit">Salvar Cadastro</button>
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
