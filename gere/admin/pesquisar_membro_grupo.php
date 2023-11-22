
<?php
  
  include_once 'menu.php';
  
  $conectar = conectarPDO();

  if (!isset($_GET['nome_membro'])) {
    echo "<script>window.location.href='listar_membros.php'</script>";
    exit;
  }

  $nome_membro = "%".trim($_GET['nome_membro'])."%";

  $sth = $conectar->prepare('SELECT * FROM membro WHERE id_grupo = 26 AND nome_membro LIKE :nome_membro');
  $sth->bindParam(':nome_membro', $nome_membro, PDO::PARAM_STR);
  $sth->execute();

  $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>


	<!-- Formulario de registro de Membros -->
<div class="container">

	<div class="row my-2">
    <div class="col d-flex flex-column align-items-center text-center">
      <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="pesquisar_membro_grupo.php" method="GET">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Pesquisar Membro" type="text" name="nome_membro">
          </div>
        </div>
        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </form>
    </div>


		<div class="col d-flex flex-column align-items-center text-center">
      <a href="registar_membros.php" class="btn btn-primary">Registar Membro</a> 
    </div>

    <div class="col d-flex flex-column align-items-center text-center">
      <a href="listar_membros_tabela.php" class="btn btn-primary">Listar por tabela</a> 
    </div>
  </div>
 	<hr>

	<div class="row ">
		

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Resultado da Pesquisa</h1> 
        </div>

		  <?php
        if (count($resultados)) {
          foreach($resultados as $Resultado) {
        ?>
			
			<div class="card mx-3 my-5">
				<div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../Imagem_membro/<?=$Resultado['foto_membro'];?>" alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                      <h4><i class="fa fa-user"></i>   <?php echo $Resultado['nome_membro']. "<br />"; ?></h4>
                      <?php 
												$dadosa = pegarPeloIDComPDOgrupo($Resultado['id_grupo']); 
												$dc = new ArrayIterator($dadosa);
												if($dc->current()->nome_grupo){
											 ?>
                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $dc->current()->nome_grupo. "<br />"; ?><?php }?></p>
                      <p class="text-muted font-size-sm"><i class="ni ni-pin-3"></i>   <?php echo $Resultado['endereco_membro']. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $Resultado['telefone_membro']. "<br />"; ?></p>
                      <button class="btn btn-secundary"><a href="ver_membro.php?idMembro=<?php echo $Resultado['id_membro'];?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="#" class="card-link card-danger">Activo</a></button>
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
