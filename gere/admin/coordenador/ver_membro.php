
<?php
    include_once 'menu.php';
    ?>

    <!-- Recebe os dados da Farmacia -->
		<?php 
			$membroId = $_GET['idMembro'];
		?>


	<!-- Formulario de registro de Membros -->
<div class="container">
				<?php
				$dados = pegarPeloIDComPDOmembro($membroId); 
				$d = new ArrayIterator($dados);?>

				<?php while($d->valid()){?>

					<div class="row">

			            <div class="col">
			              <div class="card my-5 mx-3">
			                <div class="card-body">

			                  <div class="d-flex flex-column align-items-center text-center">
			                    <img src="../Imagem_membro/<?=$d->current()->foto_membro?>". alt="Admin" class="rounded-circle" width="300" height="300">
			                    <div class="mt-3 mb-3">
			                      <h4><i class="fa fa-user"></i>  <?php echo $d->current()->nome_membro. "<br />"; ?></h4>
									<?php 
										$dadosa = pegarPeloIDComPDOgrupo($d->current()->id_grupo); 
										$dc = new ArrayIterator($dadosa);
										if($dc->current()->nome_grupo){
									 ?>
			                      <p class="text-primary mb-1"><i class="fa fa-users"></i> <?php echo $dc->current()->nome_grupo. "<br />"; ?><?php }?></p>
			                      <p class="text-primary mb-1"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo $d->current()->data_nascimento_membro. "<br />"; ?></p>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>

			            
			            <div class="col mx-3 my-5">
			              <div class="card mb-3">
			                <div class="card-body">
			                  <div class="row">
			                    <div class="col-sm-3">
			                      <h6 class="mb-0">Telefone</h6>
			                    </div>
			                    <div class="col-sm-9 text-primary">
			                      <i class="fa fa-phone"></i>  <?php echo $d->current()->telefone_membro. "<br />"; ?>
			                    </div>
			                  </div>
			                  <hr>
			                  <div class="row">
			                    <div class="col-sm-3">
			                      <h6 class="mb-0">Email</h6>
			                    </div>
			                    <div class="col-sm-9 text-primary">
			                      <i class="fa fa-envelope"></i>  <?php echo $d->current()->email_membro. "<br />"; ?>
			                    </div>
			                  </div>
			                  <hr>
			                  <div class="row">
			                    <div class="col-sm-3">
			                      <h6 class="mb-0">Morada</h6>
			                    </div>
			                    <div class="col-sm-9 text-primary">
			                      <i class="ni ni-pin-3"></i>  <?php echo $d->current()->endereco_membro. "<br />"; ?>
			                    </div>
			                  </div>
			                  <hr>
			                  <div class="row">
			                    <div class="col-sm-3">
			                      <h6 class="mb-0">Data de Entrada</h6>
			                    </div>
			                    <div class="col-sm-9 text-primary">
			                      <i class="fa fa-calendar-check" aria-hidden="true"></i>  <?php echo $d->current()->data_inicio_membro. "<br />"; ?>
			                    </div>
			                  </div>
			                  <hr>
			                  <div class="row">
			                    <div class="col-sm-3">
			                      <h6 class="mb-0">Data de Fim</h6>
			                    </div>
			                    <div class="col-sm-9 text-primary">
			                      <i class="fa fa-calendar-times" aria-hidden="true"></i>  <?php echo $d->current()->data_fim_membro. "<br />"; ?>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>

						<div class="card">
				            <div class="card-header bg-transparent">
				              <h1 class="mb-0">Sacramentos</h1>
				            </div>
			          		<div class="row gutters-sm mx-3">
	                		<div class="col-sm-4 mb-3 my-5">
			                  <div class="card h-100">
			                    <div class="card-body">
			                      <h2 class="d-flex align-items-center mb-3">Baptismo</h2>
			                      <small>Paroquia</small>
			                      <p class="text-primary mb-1"><i class="fa fa-church" aria-hidden="true"></i> <?php echo $d->current()->paroquia_sacramento_baptismo. "<br />"; ?></p>
			                      <small>Data</small>
			                      <p class="text-primary mb-1"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo $d->current()->data_sacramento_baptismo. "<br />"; ?></p>
			                      <small>Cedula</small>
			                      <a href="#" class="card-link">Ver Cedula</a>
			                    </div>
	                  		</div>
			                </div>


			                <div class="col-sm-4 mb-3 my-5">
			                  <div class="card h-100">
			                    <div class="card-body">
			                      <h2 class="d-flex align-items-center mb-3">Confirmação</h2>
			                      <small>Paroquia</small>
			                      <p class="text-primary mb-1"><i class="fa fa-church" aria-hidden="true"></i> <?php echo $d->current()->paroquia_sacramento_confirmacao. "<br />"; ?></p>
			                      <small>Data</small>
			                      <p class="text-primary mb-1"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo $d->current()->data_sacramento_confirmacao. "<br />"; ?></p>
			                      <small>Cedula</small>
			                      <a href="#" class="card-link">Ver Cedula</a>
			                    </div>
			                  </div>
			                </div>
			                

			                <div class="col-sm-4 mb-3 my-5">
			                  <div class="card h-100">
			                    <div class="card-body">
			                      <h2 class="d-flex align-items-center mb-3">Matrimonio</h2>
			                      <small>Paroquia</small>
			                      <p class="text-primary mb-1"><i class="fa fa-church" aria-hidden="true"></i> <?php echo $d->current()->paroquia_sacramento_matrimonio. "<br />"; ?></p>
			                      <small>Data</small>
			                      <p class="text-primary mb-1"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo $d->current()->data_sacramento_matrimonio. "<br />"; ?></p>
			                      <small>Cedula</small>
			                      <a href="#" class="card-link">Ver Cedula</a>
			                    </div>
			                  </div>
			                </div>

		                  </div>

			              </div>

			              	<div class="row">
			                    <div class="col-sm-12 d-flex flex-column align-items-center text-center">
			                      <a class="btn btn-info " target="" href="editar_membro.php?id_membro=<?php echo $d->current()->id_membro;?>">Editar Membro</a>
			                    </div>
							</div>
					<?php
					$d->next();
					}?>
					<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
					
					

		


