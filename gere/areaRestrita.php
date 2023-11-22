<!DOCTYPE html>
<html lang="pt.br">
<head>
	<title>Cadastro</title>

	<!-- Required de conexões e funções -->
	<?php 
	session_start();
	require "conexao.php"; ?>
	<?php include_once 'funcoes/funcaoBase.php'; ?>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" contents="width-device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Icone do Site -->
	<link rel="shortcut icon" href="img/logofarmas.jpg"/>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/areaRestrita.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>

<body id="corpo">

	<!-- Barra Azul de cima -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container"> 
			<a class="navbar-brand h1 mb-0 nav-justified" href="areaRestrita.php">Consul Farmas</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
				<span class="navbar-toggler-icon"></span>
			</button>

		</div>
	</nav>

	<div class="container">
			<div class="row">

				<!-- Imagem Consul Farm -->
				<div class="col-sm-8">
					<img src="img/welcomefarmas.jpg" class="img-fluid">
				</div>



				<!-- Validaçao dos dados para o acesso -->
				<div class="col-sm-4">
					<?php 
						if(isset($_POST['autenticar'])){
						    $username = $_POST['username'];
						    $senha = $_POST['senha'];
						    if($username == ''){?>
						        <div class="alert alert-danger alert align-center mh-3">Por Favor digite o login.</div>
					  <?php }else if($senha == ''){?>
						        <div class="alert alert-danger alert align-center">Por Favor digite a Senha.</div>
					<?php	}else{
					            $sql = "SELECT * FROM usuario WHERE username = '$username' AND senha = '$senha'";
					            $result = mysqli_query($conexao, $sql);
					            if(mysqli_num_rows($result) > 0){
					                while($res_1 = mysqli_fetch_assoc($result)){
					                $estado = $res_1['estado'];
					                $username = $res_1['username'];
					                $senha = $res_1['senha'];
					                $nivel = $res_1['nivel'];
					                $usuario_id = $res_1['usuario_id'];
					                
					                
					                if($estado == 'inativo'){?>
					                    <div class="alert alert-danger alert align-center">Usuario Inativo.</div>
					          <?php }else{
					                    session_start();
					                    $_SESSION['username'] = $username;
					                    $_SESSION['senha'] = $senha;
					                    $_SESSION['nivel'] = $nivel;
					                    $_SESSION['usuario_id'] = $usuario_id;
					                    
					                    if($nivel == 'admin'){
					                        echo "<script>alertDialog('Bem vindo ao perfil do Administrador!');window.location.href='admin/index.php'</script>";
					                        $_SESSION['username']= $username;
					                        echo $_SESSION['nome'];
					                    }else if($nivel == 'internauta'){
					                        echo "<script>alert('Bem vindo ao perfil do Internauta!');window.location.href='internauta/index.php'</script>";
					                        $_SESSION['username']= $username;
					                        $_SESSION['userr']= $usuario_id;
					                        
					                        echo $_SESSION['username'];
					                        echo $_SESSION['userr'];
					                    }else if($nivel == 'cliente'){
					                        echo "<script>alert('Bem vindo ao perfil do Cliente!');window.location.href='cliente/index.php'</script>";
					                        $_SESSION['nomeT']= $username;
					                        echo $_SESSION['nomeT'];
					                    }
					                }
					                }
					            }else{?>
					                <div class="alert alert-danger alert align-center">Dados Incorrectos.</div>
					   <?php    }
					        }
						}
					?>

					<!-- area de login-->
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<img src="img/logofarmas.jpg" class="img-fluid float-start">
						</div>

						<div class="panel-body bg-transparente"> 
							<form id="login-form" method="post" action="" enctype="multipart/form-data">
								<div class="form-group mb-2 "> 
									<div class="form-group col-md-12">
							  				<input type="text" class="form-control" name="username" placeholder="Usuario">
										</div>
										<div class="form-group col-md-12">
							  				<input type="password" class="form-control" name="senha" placeholder="Senha">
										</div>
									<div>
										<input type="submit" class="btn btn-primary mx-3 mb-4" id="autenticar" name="autenticar" value="Autenticar">
									</div>
								</div> 
							</form>
							<div><input type="checkbox"> Esqueceu a Palavra Passe?</div>
							<div>
								<a class="card-link mx-3 mb-4">Ainda não tem conta?</a><a href="cadastro.php" class="card-link">Cadastre-se</a>
							</div>
						</div> 
					</div>
					<!-- fim da area de login-->
					
				</div>
			</div>
		</div>	

	<!-- Rodape / Footer -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<blockquote class="blockquote text-center">
						<footer class="blockquote-footer mb-0">Copyright &copy; 2021 - by MetodSoft</footer>
						<hr>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Optional JavaScript -->
	<script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>