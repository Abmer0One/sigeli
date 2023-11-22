  <?php
    include_once 'menu.php';
    $dados = listarPDOmissa(); 
    $d = new ArrayIterator($dados);
  ?>

  <div class="row">
      <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">LISTA DAS MISSAS</h3>
                </div>
                <div class="col text-right">
                  <a href="registar_missa.php" class="btn btn-primary">Registar Missa</a> 
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo de Missa</th>
                    <th scope="col">Data da Missa</th>
                    <th scope="col">Padre da Missa</th>
                    <th scope="col">dia da Missa</th>
                    <th scope="col">Hora da Missa</th>
                    <th scope="col">Acólitos da Missa</th>
                    <th scope="col">Proclamadores da Missa</th>
                    <th scope="col">Coral da Missa</th>
                    <th scope="col">Acolhimento da Missa</th>
                    <th scope="col">Ministros da Missa</th>
                    <th scope="col">Leituras da Missa</th>
                    <th scope="col">Alterar Dados</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->id_missa. "<br />"; ?></th> 
                    <td><?php echo $d->current()->tipo_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->data_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->padre_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->dia_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->hora_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->acolitos_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->leitores_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->coral_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->acolhimento_missa. "<br />"; ?></td>
                    <td><?php echo $d->current()->ministros_missa. "<br />"; ?></td>
                    <td><a href="#"><?php echo $d->current()->leituras_missa. "<br />"; ?></a></td>
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
    

    