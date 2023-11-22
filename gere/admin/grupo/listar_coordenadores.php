
<?php
    include_once 'menu.php';
    ?>


    	<!-- Listar dados do grupo -->
<div class="container">
				<?php 
				$dados = pegarPeloIDComPDOgrupo($_SESSION['tipo_nivel']); 
				$d = new ArrayIterator($dados);?>

				<?php while($d->valid()){?>
					<div class="card my-3">
			            <div class="card-header bg-transparent">
			              <h1 class="mb-0">Dados do Grupo</h1>
			            </div>
	                    <div class="row my-3 mx-3">
	                    	<div class="col-sm-2 ">
	                    		<img src="../Imagem_grupo/<?=$d->current()->imagem_grupo?>". alt="Admin" class="rounded-circle" width="150" height="150">
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
	             
					<?php
					$d->next();
				}?>
					



	<!-- Formulario de registro de Membros -->


<div class="container">
    
	<div class="row ">
		<?php 
		$dados = pegarPeloIDComPDOcoordenador($_SESSION['tipo_nivel']); 
		$d = new ArrayIterator($dados);?>

			<?php 
			if (is_null($d)) {
			?>
				<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
      		<h1>Nenhum Coordenador Registado no Grupo</h1> 
    		</div>
			<?php
			}
			?>

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
      <h1>Lista dos Coordenadores</h1> 
    </div>
    <hr>

    <div class="container">
	
			<div class="row my-2">
		        <div class="col d-flex flex-column align-items-center text-center">
		          <a href="registar_coordenador.php" class="btn btn-primary">Registar Coordenador</a> 
		        </div>
		    </div>
    </div>


		<?php while($d->valid()){?>
			
			<div class="card mx-3 my-5">
				<div class="card-body">
				<?php 
					$dados_m = pegarPeloIDComPDOmembro($d->current()->membro_coordenador_id); 
					$d_m = new ArrayIterator($dados_m);?>
					<?php while($d_m->valid()){?>
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../Imagem_membro/<?=$d_m->current()->foto_membro?>" alt="foto" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-user"></i>   <?php echo $d_m->current()->nome_membro. "<br/>"; ?><?php $d_m->next(); }?></h4>


                      <?php 
											$dados_g = pegarPeloIDComPDOgrupo($_SESSION['tipo_nivel']); 
											$d_g = new ArrayIterator($dados_g);?>
											<?php while($d_g->valid()){?>
								
                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $d_g->current()->nome_grupo. "<br/>"; ?><?php $d_g->next(); }?></p>

                      <p class="text-muted font-size-sm"><i class="ni ni-pin-3"></i>   <?php echo $d->current()->cargo_coordenador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $d->current()->descricao_cargo_coordenador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $d->current()->data_inicio_coordenador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <td><?php echo $d->current()->data_fim_coordenador. "<br />"; ?></p>
                      <button class="btn btn-secundary"><a href="ver_membro.php?idMembro=<?php echo $d->current()->id_membro;?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="#">Activo</a></button>
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

<!-- Footer -->
<?php
	include_once 'rodape.php';
?>

