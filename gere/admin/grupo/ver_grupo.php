
<?php
    include_once 'menu.php';
    ?>

    <!-- Recebe os dados da lista de grupos -->
		<?php 
			$membroId = $_GET['idGrupo'];
		?>


	<!-- Listar dados do grupo -->
<div class="container">
				<?php 
				$dados = pegarPeloIDComPDOgrupo($membroId); 
				$d = new ArrayIterator($dados);?>

				<?php while($d->valid()){?>
					<div class="card my-3">
			            <div class="card-header bg-transparent">
			              <h1 class="mb-0">Dados do Grupo</h1>
			            </div>
	                    <div class="row my-3 mx-3">
	                    	<div class="col-sm-2 ">
	                    		<img src="Imagem_grupo/<?=$d->current()->imagem_grupo?>". alt="Admin" class="rounded-circle" width="150" height="150">
	                    	</div>

	                    	<div class="col-sm-4">
		                      <h4><i class="fa fa-users"></i>   <?php echo $d->current()->nome_grupo. "<br />"; ?></h4>
		                      <p class="text-muted font-size-sm"><i class="fa fa-heart"></i>   <?php echo $d->current()->carisma_grupo. "<br />"; ?></p>
		                      <p class="text-muted font-size-sm"><i class="fa fa-birthday-cake"></i>   <?php echo $d->current()->fundacao_grupo. "<br />"; ?></p>
	                      	</div>
	                      	<div class="col-sm-4">
		                      <p class="text-muted font-size-sm"><i class="fa fa-user"></i>   <?php echo $d->current()->padroeiro_grupo. "<br />"; ?></p>
		                      
		                      <?php 
								$dadosa = pegarPeloIDComPDOtipogrupo($d->current()->id_tipo_grupo); 
								$dc = new ArrayIterator($dadosa);
								if($dc->current()->nome_tipo_grupo){
							 ?>
		                      <p class="text-primary mb-1"><i class="fa fa-object-group"></i>   <?php echo $dc->current()->nome_tipo_grupo. "<br />"; ?><?php }?></p>
		                      <a href="regulamento.php?regulamentoGrupo=<?php echo $d->current()->regulamento_grupo;?>" class="card-link col-md-6">Ler o Regulamento</a>
	                      	</div>
	                    </div>

	                    <div class="row my-3">
			                    <div class="col-sm-12 d-flex flex-column align-items-center text-center">
			                      <a class="btn btn-info " target="" href="actualizar_grupo.php?id_grupo=<?php echo $d->current()->id_grupo;?>">Editar Grupo</a>
			                    </div>
							</div> 
	              	</div>

	              	<!-- Fim de Listar dados do grupo -->
	              	<div class="row">
	                    <div class="col-sm-12 d-flex flex-column align-items-center text-center">
	                      <h1>Membros do Grupo do(s) <?php echo $d->current()->nome_grupo. "<br />"; ?></h1>
	                    </div>

						<!-- Listar Membros do Grupo -->
	                    <div class="row mx-3">
							<?php 
							$dados = pegarPeloIDComPDOmembroGrupo($membroId); 
							$d = new ArrayIterator($dados);?>

							<!-- Exclusao de dados da base de dados -->
							<?php
								try{
									if(isset($_GET['ac'])){
										if($_GET['ac'] == 'del'){
											$id_membro = filter_input(INPUT_GET, 'id_membro', FILTER_SANITIZE_NUMBER_INT);
											$id_membro = filter_var($id_membro, FILTER_VALIDATE_INT);
											if($id_membro){
												if(deletarPDOmembro($id_membro)){
													echo "<script>alert(' Membro deletado com sucesso');window.location.href='listar_membros.php';</script>";
												}else{
													throw new Exception('Erro ao deletar Membro');
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

							<?php while($d->valid()){?>
								
								<div class="card mx-3 my-5">
									<div class="card-body mx-3">

					                  <div class="d-flex flex-column align-items-center text-center">
					                    <img src="Imagem_membro/<?=$d->current()->foto_membro?>" alt="Admin" class="rounded-circle" width="150" height="150">
					                    <div class="mt-3">
					                      <h4><i class="fa fa-user"></i>   <?php echo $d->current()->nome_membro. "<br />"; ?></h4>
					                      <?php 
											$dadosa = pegarPeloIDComPDOgrupo($d->current()->id_grupo); 
											$dc = new ArrayIterator($dadosa);
											if($dc->current()->nome_grupo){
										 ?>
					                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $dc->current()->nome_grupo. "<br />"; ?><?php }?></p>
					                      <p class="text-muted font-size-sm"><i class="ni ni-pin-3"></i>   <?php echo $d->current()->endereco_membro. "<br />"; ?></p>
					                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $d->current()->telefone_membro. "<br />"; ?></p>
					                      <button class="btn btn-secundary"><a href="ver_membro.php?idMembro=<?php echo $d->current()->id_membro;?>" class="card-link">Ver Detalhes</a></button>
					                      <button class="btn btn-outline-danger"><a href="?id_membro=<?php echo $d->current()->id_membro;?>&ac=del" class="card-link card-danger">Excluir</a></button>
					                    </div>
					                  </div>
					                </div>
					            </div>
								<?php
								$d->next();
							} 
							
							?>	
						</div>
						<!-- Fim de Listar Membros do Grupo -->

					</div>
					<?php
					$d->next();
				}?>
					<!-- Footer -->

<?php
	include_once 'rodape.php';
?>
					
					

		


