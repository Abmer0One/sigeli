
<?php
    include_once 'menu.php';
    ?>


	<!-- Listagem de Reserva -->
<div class="container">
	
	<div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_reserva.php" class="btn btn-primary">Registar Reserva</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_reserva_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<div class="row ">
		<?php 
		$dados = listarPDOreserva(); 
		$d = new ArrayIterator($dados);
		?>

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Lista das Reservas</h1> 
        </div>


		<?php while($d->valid()){?>

			<div class="card mx-3 my-5">
				<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="Imagem_patrimonio/Patrimonio.png". alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-object-group"></i>   <?php echo $d->current()->material_reserva. "<br />"; ?></h4>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->reservador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->tipo_de_actividade. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->data_reserva. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->hora_reserva. "<br />"; ?></p>
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



