
<?php
    include_once 'menu.php';
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
            <input class="form-control" placeholder="Pesquisar Comissão" type="text" name="nome_comissao">
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
		<?php 
		$dados = listarPDOcomissao(); 
		$d = new ArrayIterator($dados);?>

		<!-- Exclusao de dados da base de dados -->
		<?php
			try{
				if(isset($_GET['ac'])){
					if($_GET['ac'] == 'del'){
						$id_comissao = filter_input(INPUT_GET, 'id_comissao', FILTER_SANITIZE_NUMBER_INT);
						$id_comissao = filter_var($id_comissao, FILTER_VALIDATE_INT);
						if($id_comissao){
							if(deletarPDOcomissao($id_comissao)){
								echo "<script>alert(' Comissão deletada com sucesso');window.location.href='listar_comissoes.php';</script>";
							}else{
								throw new Exception('Erro ao deletar Comissão');
							}
						}else{
							throw new Exception('É necessario pasar um ID valido !');
						}
					}
				}
			}catch(Exception $e){
				echo "Erro: ".$e->getMessage();
			}
		?>

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Lista das Comissões</h1> 
        </div>


		<?php while($d->valid()){?>

			<div class="card mx-3 my-5">
				<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../Imagem_comissao/<?=$d->current()->imagem_comissao?>". alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-users"></i>   <?php echo $d->current()->nome_comissao. "<br />"; ?></h4>

                      <p class="text-muted font-size-sm"><i class="fa fa-heart"></i>   <?php echo $d->current()->detalhes_comissao. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-birthday-cake"></i>   <?php echo $d->current()->regulamento_comissao. "<br />"; ?></p>
                      <button class="btn btn-secundary"><a href="ver_comissao.php?idComissao=<?php echo $d->current()->id_comissao;?>&nomeComissao=<?php echo $d->current()->nome_comissao;?>&detalheComissao=<?php echo $d->current()->detalhes_comissao;?>&regulamentoComissao=<?php echo $d->current()->regulamento_comissao;?>&fotoComissao=<?php echo $d->current()->imagem_comissao?>" class="card-link">Ver Detalhes</a></button>
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



