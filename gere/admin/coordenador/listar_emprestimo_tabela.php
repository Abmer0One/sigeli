
<?php
  include_once 'menu.php';
	$dados = listarPDOemprestimo(); 
	$d = new ArrayIterator($dados);
?>

		
      <div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista dos Emprestimos</h3>
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
                    <th scope="col">responsavel</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Data de Emprestimo</th>
                    <th scope="col">Data de Entrega</th>
                    <th scope="col">Observação</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->material_emprestimo. "<br />"; ?></th>
                    <td><?php echo $d->current()->responsavel_emprestimo. "<br />"; ?></td>
										<td><?php echo $d->current()->quantidade_emprestimo. "<br />"; ?></td>
										<td><?php echo $d->current()->data_emprestimo. "<br />"; ?></td>
                    <td><?php echo $d->current()->data_entrega. "<br />"; ?></td>
                    <td><?php echo $d->current()->observacao_emprestimo. "<br />"; ?></td>
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


