
<?php
  include_once 'menu.php';
	$dados = listarPDOreserva(); 
	$d = new ArrayIterator($dados);
?>

		
      <div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista das Reservas</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Ver Tudo</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Material</th>
                    <th scope="col">Reservador</th>
                    <th scope="col">Actividade</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->material_reserva. "<br />"; ?></th>
                    <td><?php echo $d->current()->reservador. "<br />"; ?></td>
										<td><?php echo $d->current()->tipo_de_actividade. "<br />"; ?></td>
										<td><?php echo $d->current()->data_reserva. "<br />"; ?></td>
                    <td><?php echo $d->current()->hora_reserva. "<br />"; ?></td>
                  </tr>
                  <?php
        					$d->next();
        					}?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
			
			<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>


