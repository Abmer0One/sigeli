<!doctype html>
<html lang="pt.br">
<head>
	<title>inicio</title>

	<!-- Funçoes relacionadas a Base de dados -->
	<?php include_once '../conexao.php'; ?>
	<?php include_once '../funcoes/funcaoBase.php'; ?>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" contents="width-device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Icone do Site -->
	<link rel="shortcut icon" href="../img/logofarmas.jpg"/>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-submenu.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
</head>
<body>

	<!-- Barra Azul de cima -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand h1 mb-0 nav-justified" href="../index.php">Consul Farmas</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSite">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						
						<form  class="form-inline mx-5" method="POST" action="pesquisar.php">
							<input class="form-control ml-auto mx-2" type="text" name="pesquisar">
							<button class="btn btn-primary" type="Submit">Pesquisar</button>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<?php
	$pesquisar = $_POST['pesquisar'];
	$resultado_farmacia = "SELECT * FROM farmacia WHERE nome LIKE '%$pesquisar%' LIMIT 5";
	$resultado_farmacias = mysqli_query($con, $resultado_farmacia);
	?>

	<!-- Listagem de Farmácias com o componente CARD -->

	<h2>Listagem de Farmácias</h2>
		
	<?php 
			while ($rows_farmacias = mysqli_fetch_array($resultado_farmacias)){ ?>
			<div class="col my-5 mx-5">
				<div class="col-sm-1 col-md-2">
					<div class="card">
						<img class="card-img-top" src="../img/logofarmas.jpg">
						<div class="card-body">
							<h4 class="card-title"><?php echo $rows_farmacias['nome']."<br>"; ?></h4>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $rows_farmacias['endereco']."<br>"; ?></h6>
							<p class="card-text"><?php echo $rows_farmacias['telefone']."<br>"; ?></p>
						</div>
						<div>
							<a href="#" class="card-link">Ver detalhes</a>
						</div>
					</div>
				</div>
			</div>
			<?php }
		echo "Nenhum dados compativel em relaçao a pesquisa.";
	?>

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
	<script src="../js/jquery-1.9.0.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap-submenu.js" type="text/javascript"></script>
	<script src="../js/jquery-slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
	<script src="../dist/util.js"></script>
    <script src="../dist/dropdown.js"></script>
    <script src="../dist/collapse.js"></script>
    <script src="../dist/modal.js"></script>

</body>
</html>