<?php
  include_once 'menu.php';

  $dados = listarPDOescalaActividade(); 
  $d = new ArrayIterator($dados);
?>
    <!-- Header -->

    <!-- Tabela de Actividades -->
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista de Actividades</h3>
                </div>
                <div class="col text-right">
                  <a href="registar_actividade.php" class="btn btn-primary">Registar Actividade</a> 
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Data da Actividade</th>
                    <th scope="col">Hora da Actividade</th>
                    <th scope="col">Tipo de Actividade</th>
                    <th scope="col">Objectivo</th>
                    <th scope="col">Local da Actividade</th>
                    <th scope="col">Responsavel</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Alterar</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->data_actividade. "<br />"; ?></th>
                    <td><?php echo $d->current()->hora_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->tipo_de_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->objectivo_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->local_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->responsavel_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->participantes_actividade. "<br />"; ?></td>
                    <td><a href="#">Alterar Dados</a></td>
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
</div>
    

    