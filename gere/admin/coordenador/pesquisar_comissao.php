
<?php
    include_once 'menu.php';

    $conectar = conectarPDO();

  if (!isset($_GET['nome_comissao'])) {
    echo "<script>window.location.href='listar_comissoes.php'</script>";
    exit;
  }

  $nome_comissao = "%".trim($_GET['nome_comissao'])."%";
  $id_comissao = $_SESSION['tipo_nivel'];


  $sth = $conectar->prepare('SELECT * FROM comissao WHERE nome_comissao LIKE :nome_comissao');
  $sth->bindParam(':nome_comissao', $nome_comissao, PDO::PARAM_STR);
  $sth->execute();

  $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>


	<!-- Listagem de Comissões -->

<div class="container">
		<meta charset="utf-8">
	<div class="row my-2">

		<div class="col d-flex flex-column align-items-center text-center">
      <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="pesquisar_comissao.php" method="GET">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Pesquisar Grupo" type="text" name="nome_grupo">
          </div>
        </div>
        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </form>
    </div>
    
    <div class="col d-flex flex-column align-items-center text-center">
      <a href="registar_comissao.php" class="btn btn-primary">Registar Comissão</a> 
    </div>

    <div class="col d-flex flex-column align-items-center text-center">
      <a href="listar_comissoes_tabela.php" class="btn btn-primary">Listar por tabela</a> 
    </div>
</div>

    <hr>
	<div class="row ">
		

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Lista das Comissões</h1> 
        </div>


		<?php
        if (count($resultados)) {
          foreach($resultados as $Resultado) {
        ?>

			<div class="card mx-3 my-5">
				<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../Imagem_comissao/<?=$Resultado['imagem_comissao'];?>". alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-users"></i>  <?=$Resultado['nome_comissao'];?></h4>

                      <p class="text-muted font-size-sm"><i class="fa fa-heart"></i> <?=$Resultado['detalhes_comissao'];?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-birthday-cake"></i> <?=$Resultado['regulamento_comissao'];?></p>
                      <button class="btn btn-secundary"><a href="ver_comissao.php?idComissao=<?=$Resultado['id_comissao'];?>&nomeComissao=<?=$Resultado['nome_comissao'];?>&detalheComissao=<?=$Resultado['detalhes_comissao'];?>&regulamentoComissao=<?=$Resultado['regulamento_comissao'];?>&fotoComissao=<?=$Resultado['imagem_comissao'];?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="#">Alterar Dados</a></button>
                    </div>
                  </div>
                </div>
            </div>
			<?php
      } } else {
      ?>

      <label>Não foram encontrados resultados pelo termo buscado.</label>
      <?php
      }
      ?>
		</div>
	</div>
	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>



