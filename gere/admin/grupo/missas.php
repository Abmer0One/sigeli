<?php
      include_once 'menu.php';
    ?>
    <!-- Header -->

    <!-- Tabela de Missas -->
  <div class="container">

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_missa.php" class="btn btn-primary">Registar Missa</a> 
        </div>
    </div>

    <hr>
    <div class="row mx-3 mb-5">
      <!-- Criaçao da Tabela de listagem com dados da base de dados -->
      <div class="mycontent-left mb-5">
        <table class="table table-dark md-3 mx-3"> 
          <?php 
          $dados = listarPDOmissa(); 
          $d = new ArrayIterator($dados);?>

          <!-- Exclusao de dados da base de dados -->
          <?php
            try{
              if(isset($_GET['ac'])){
                if($_GET['ac'] == 'del'){
                  $id_missa = filter_input(INPUT_GET, 'id_missa', FILTER_SANITIZE_NUMBER_INT);
                  $id_missa = filter_var($id_missa, FILTER_VALIDATE_INT);
                  if($id_missa){
                    if(deletarPDOmissa($id_missa)){
                      echo "<script>alert(' Missa deletada com sucesso');window.location.href='missas.php';</script>";
                    }else{
                      throw new Exception('Erro ao deletar a Missa');
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

          <h2 class="mx-3">Lista de Missas</h2> 
          
          <thead>
            <tr>
              <th>ID</th>
              <th>Data da Missa</th> 
              <th>Hora da Missa</th>
              <th>Tipo de Missa</th>
              <th>dia da Missa</th>
              <th>Leituras da Missa</th>
              <th>Padre da Missa</th>
              <th>Acólitos da Missa</th>
              <th>Proclamadores da Missa</th>
              <th>Ministros da Missa</th>
              <th>Acolhimento da Missa</th>
              <th>Coral da Missa</th>
              <th>Visualizar</th>
              <th>Excluir</th>
            </tr>
          </thead> 

          <?php while($d->valid()){?>

          <tbody> 
            <tr> 
              

              <td><?php echo $d->current()->id_missa. "<br />"; ?></td> 
              
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
              <td><?php echo $d->current()->leituras_missa. "<br />"; ?></td>
              <td><a href="#">Visualizar Leituras</a></td>
              <td><a href="?id_missa=<?php echo $d->current()->id_missa;?>&ac=del">Excluir Dados</a></td>
              
            </tr> 
            <?php
            $d->next();
            }?>
          </tbody> 
        </table>
      </div>
    </div>
    <!-- Tabela de Missa End -->

  <!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>
    

    