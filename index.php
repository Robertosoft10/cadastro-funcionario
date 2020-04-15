<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-bt">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cadastro Funcionário</title>
        <link href="Css/Bootstrap/css/styles.css" rel="stylesheet" />
		<link href="Css/stylecss.css" rel="stylesheet">
    </head>
    <body class="bg-default">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 text-center">
							<small id="log-sistema">CF</small><br>
							<small id="nome-sistema">Sistema Cadastro de Funcionário</small>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" id="login-bg">
									<h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="Config/login.php" method="post">
										<?php if(isset($_SESSION['loginVazio'])){?>
										<div class="alert alert-danger">
										<?php echo $_SESSION['loginVazio'];?>
										</div>
										<?php unset($_SESSION['loginVazio']); }?>
										
										<?php if(isset($_SESSION['loginIncorreto'])){?>
										<div class="alert alert-danger">
										<?php echo $_SESSION['loginIncorreto'];?>
										</div>
										<?php unset($_SESSION['loginIncorreto']); }?>
										
										
										<?php if(isset($_SESSION['userok'])){?>
										<div class="alert alert-success">
										<?php echo $_SESSION['userok'];?>
										</div>
										<?php unset($_SESSION['userok']); }?>
                                            <div class="form-group">
											<input class="form-control py-4" id="inputEmailAddress" type="email" name="email" placeholder="E-mail" /></div>
                                            <div class="form-group">
											<input class="form-control py-4" id="inputPassword" type="password" name="senha" placeholder="Senha" /></div>
                                            <div>
                                             <button class="btn btn-success col-md-12">Acessar</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Robertosoft10 2020</div>
                            <div>
                             
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/scripts.js"></script>
    </body>
</html>
