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
	  <div class="container-fluid">
	    <a class="navbar-brand" href="../index.php">Consul Farm</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="listarFarmacia.php">Farmácias</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="listarMedicamento.php">Medicamentos</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link disabled" href="areaRestrita.php" tabindex="-1" aria-disabled="true">Cadastrar-se</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>



	<!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-black">
                        <!-- Page heading-->
                        <h1 class="mb-5">Diz-nos, o que estas a sentir?</h1>
                        <!-- Search form-->
                        <form  class="form-inline mb-5" method="POST" action="funcoes/pesquisar_sintomas.php">
                        	<div class="input-group input-group-lg mb-5">
						<input class="form-control ml-auto mx-2" type="text" placeholder="Digite o que estas a sentir..." name="pesquisar">
						<button class="btn btn-primary" type="Submit">Pesquisar</button>
						</div>
					</form>
                    </div>
                </div>
            </div>
        </div>
    </header>
	<?php
	$pesquisar = $_POST['pesquisar'];
	$resultado_solucoes = "SELECT descrisao FROM sintoma WHERE nome LIKE '%$pesquisar%' LIMIT 5";
	$resultado_solucoes = mysqli_query($con, $resultado_solucoes);
	?>

	<!-- Listagem de Medicamentos com o componente CARD -->
	<div class="col-sm-6">
	<h2>Soluções para o seu mau estar</h2>
		
	<?php 
			while ($rows_projectos = mysqli_fetch_array($resultado_solucoes)){ ?>
			<div class="row my-5 mx-2">
				<div class="row-6 row-sm-6 my-2">
					<div class="card">
						<img class="card-img-top" src="../img/logofarmas.jpg">
						<div class="card-body">
							<h4 class="card-title"><?php echo $rows_projectos['descrisao']."<br>"; ?></h4>
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