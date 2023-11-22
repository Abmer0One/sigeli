
<?php
    include_once 'menu.php';
    ?>

    <!-- Recebe os dados da lista de grupos -->
		<?php 
			$comissaoId = $_GET['idComissao'];
			$nomeComissao = $_GET['nomeComissao'];
			$detalheComissao = $_GET['detalheComissao'];
			$regulamentoComissao = $_GET['regulamentoComissao'];
			$fotoComissao = $_GET['fotoComissao'];
		?>


	<!-- Listar dados do grupo -->
	<div class="container">
				
		<div class="card my-3">
            <div class="card-header bg-transparent">
              <h1 class="mb-0">Dados da Comissão</h1>
            </div>
            <div class="row my-3 mx-3">
            	<div class="col-sm-2 ">
            		<img src="../Imagem_comissao/<?=$fotoComissao?>". alt="Admin" class="rounded-circle" width="150" height="150">
            	</div>

            	<div class="col-sm-4">
                  <h4><i class="fa fa-users"></i>   <?php echo $nomeComissao. "<br />"; ?></h4>
                  <p class="text-muted font-size-sm"><i class="fa fa-heart"></i>   <?php echo $detalheComissao. "<br />"; ?></p>
              	</div>
              	<div class="col-sm-4">
                  <a href="regulamento_comissao.php?regulamentoComissao=<?php echo $regulamentoComissao;?>" class="card-link col-md-6">Ler o Regulamento</a>
              	</div>

              	<div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="editar_comissao.php?id_comissao=<?php echo $comissaoId;?>">Editar Comissão</a>
                          <a class="dropdown-item" href="#">Coordenação</a>
                          <a class="dropdown-item" href="#">Actividades</a>
                          <a class="dropdown-item" href="#">Escalas</a>
                        </div>
                      </div>
            </div> 
      	</div>

      	<!-- Fim de Listar dados do grupo -->
      	<div class="row">
            <div class="col-sm-12 d-flex flex-column align-items-center text-center">
              <h1>Grupos da Comissão de(o)s <?php echo $nomeComissao. "<br />"; ?></h1>
            </div>
	
				<?php 
					//echo $comissaoId;
					$dadosg = pegarPeloIDComPDOcomissaoGrupo($comissaoId); 
					$dgrupo = new ArrayIterator($dadosg);
					try{
						if(!is_array($dgrupo)){
							//echo "Esta Comissão não possui Grupos...";
						}else{
							throw new Exception('Ok');
						}
					}catch(Exception $e){
						echo "Erro: ".$e->getMessage();
					}
				?>

				<!-- Listar Membros do Grupo -->
	            <div class="row mx-3">

				<!-- Exclusao de dados da base de dados -->
				<?php
					try{
						if(isset($_GET['ac'])){
							if($_GET['ac'] == 'del'){
								$id_grupo = filter_input(INPUT_GET, 'id_grupo', FILTER_SANITIZE_NUMBER_INT);
								$id_grupo = filter_var($id_grupo, FILTER_VALIDATE_INT);
								if($id_grupo){
									if(deletarPDOmembro($id_grupo)){
										echo "<script>alert(' Grupo deletado com sucesso');window.location.href='ver_comissao.php';</script>";
									}else{
										throw new Exception('Erro ao deletar Grupo');
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

			

					<?php while($dgrupo->valid()){?>
					
						
						<div class="card mx-3 my-5">
							<div class="card-body">
			                  <div class="d-flex flex-column align-items-center text-center">
			                    <img src="../Imagem_grupo/<?=$dgrupo->current()->imagem_grupo?>". alt="Admin" class="rounded-circle" width="150" height="150">
			                    <div class="mt-3">
			                    	
			                      <h4><i class="fa fa-users"></i>   <?php echo $dgrupo->current()->nome_grupo. "<br />"; ?></h4>
			                      <?php 
									$dadosa = pegarPeloIDComPDOcomissao($dgrupo->current()->id_comissao); 
									$dc = new ArrayIterator($dadosa);
									if($dc->current()->nome_comissao){
								 ?>
			                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $dc->current()->nome_comissao. "<br />"; ?><?php }?></p>

			                      <p class="text-muted font-size-sm"><i class="fa fa-heart"></i>   <?php echo $dgrupo->current()->carisma_grupo. "<br />"; ?></p>
			                      <p class="text-muted font-size-sm"><i class="fa fa-birthday-cake"></i>   <?php echo $dgrupo->current()->fundacao_grupo. "<br />"; ?></p>
			                      <p class="text-muted font-size-sm"><i class="fa fa-user"></i>   <?php echo $dgrupo->current()->padroeiro_grupo. "<br />"; ?></p>
			                      <?php 
									$dadosg = pegarPeloIDComPDOtipogrupo($dgrupo->current()->id_tipo_grupo); 
									$dg = new ArrayIterator($dadosg);
									if($dg->current()->nome_tipo_grupo){
								 ?>
			                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $dg->current()->nome_tipo_grupo. "<br />"; ?><?php }?></p>
			                      <button class="btn btn-secundary"><a href="ver_grupo.php?idGrupo=<?php echo $dgrupo->current()->id_grupo;?>" class="card-link">Ver Detalhes</a></button>
			                      <button class="btn btn-outline-danger"><a href="#">Alterar Dados</a></button>
			                    </div>
			                  </div>
			                </div>
			            </div>
						<?php
						$dgrupo->next();
					} 
					?>
				
				</div>
				<!-- Fim de Listar Membros do Grupo -->
			</div>

					<!-- Footer -->
	<?php
		include_once 'rodape.php';
	?>
					
					

		


