
<?php
  include_once 'menu.php';
	$dados = listarPDOpatrimonio(); 
	$d = new ArrayIterator($dados);
?>

		
      <div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista dos Patrimonios</h3>
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
                    <th scope="col">Descrisão</th>
                    <th scope="col">Local</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observação</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->descrisao_patrimonio. "<br />"; ?></th>
                    <td><?php echo $d->current()->local_patrimonio. "<br />"; ?></td>
										<td><?php echo $d->current()->quantidade_patrimonio. "<br />"; ?></td>
										<td><?php echo $d->current()->observacao_patrimonio. "<br />"; ?></td>
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


