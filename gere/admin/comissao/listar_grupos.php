
<?php
    include_once 'menu.php';
    ?>


	<!-- Listagem de Grupos -->
<div class="container">
	
	<div class="row my-2">

		<div class="col d-flex flex-column align-items-center text-center">
      <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="pesquisar_grupo.php" method="GET">
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
      <a href="registar_grupos.php" class="btn btn-primary">Registar Grupo</a> 
    </div>

    <div class="col d-flex flex-column align-items-center text-center">
      <a href="listar_grupos_tabela.php" class="btn btn-primary">Listar por tabela</a> 
    </div>

  </div>
    <hr>
	<div class="row ">
		<?php 
		$dados = pegarPeloIDComPDOgrupoComissao($_SESSION['tipo_nivel']); 
		$d = new ArrayIterator($dados);
		
		$gr = array($d->current()->id_grupo);
		$contarGrupo = array_pop($gr);
		
		?>

		

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Lista dos Grupos</h1> 
        </div>


		<?php while($d->valid()){?>

			<div class="card mx-3 my-5">
				<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../Imagem_grupo/<?=$d->current()->imagem_grupo?>". alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-users"></i>   <?php echo $d->current()->nome_grupo. "<br />"; ?></h4>
                      <?php 
						$dadosa = pegarPeloIDComPDOcomissao($d->current()->id_comissao); 
						$dc = new ArrayIterator($dadosa);
						if($dc->current()->nome_comissao){
					 ?>
                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $dc->current()->nome_comissao. "<br />"; ?><?php }?></p>

                      <p class="text-muted font-size-sm"><i class="fa fa-heart"></i>   <?php echo $d->current()->carisma_grupo. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-birthday-cake"></i>   <?php echo $d->current()->fundacao_grupo. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-user"></i>   <?php echo $d->current()->padroeiro_grupo. "<br />"; ?></p>
                       <?php 
						$dadosa = pegarPeloIDComPDOtipogrupo($d->current()->id_tipo_grupo); 
						$dc = new ArrayIterator($dadosa);
						if($dc->current()->nome_tipo_grupo){
					 ?>
                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $dc->current()->nome_tipo_grupo. "<br />"; ?><?php }?></p>
                      <button class="btn btn-secundary"><a href="ver_grupo.php?idGrupo=<?php echo $d->current()->id_grupo;?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="#">Alterar Dados</a></button>
                    </div>
                  </div>
                </div>
            </div>
			<?php
			$d->next();
			}?>	
		</div>
	</div>
	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>



