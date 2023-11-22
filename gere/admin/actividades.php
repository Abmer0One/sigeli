<?php
      include_once 'menu.php';
    ?>
    <!-- Header -->

    <!-- Tabela de Actividades -->
    <!-- Formulario de registro de Tipo de Grupo -->
  <div class="container">

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_actividade.php" class="btn btn-primary">Registar Actividade</a> 
        </div>
    </div>

    <hr>
    <div class="row mx-3 mb-5">
      <!-- Criaçao da Tabela de listagem com dados da base de dados -->
      <div class="mycontent-left mb-5">
        <table class="table table-dark md-3 mx-3"> 
          <?php 
          $dados = listarPDOescalaActividade(); 
          $d = new ArrayIterator($dados);?>

          <!-- Exclusao de dados da base de dados -->
          <?php
            try{
              if(isset($_GET['ac'])){
                if($_GET['ac'] == 'del'){
                  $id_actividade = filter_input(INPUT_GET, 'id_actividade', FILTER_SANITIZE_NUMBER_INT);
                  $id_actividade = filter_var($id_actividade, FILTER_VALIDATE_INT);
                  if($id_actividade){
                    if(deletarPDOactividade($id_actividade)){
                      echo "<script>alert(' Actividade deletada com sucesso');window.location.href='actividades.php';</script>";
                    }else{
                      throw new Exception('Erro ao deletar a Actividade');
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

          <h2 class="mx-3">Lista de Actividades</h2> 
          
          <thead>
            <tr>
              <th>ID</th>
              <th>Data da Actividade</th> 
              <th>Hora da Actividade</th>
              <th>Tipo de Actividade</th>
              <th>Objectivo</th>
              <th>Local da Actividade</th>
              <th>Responsavel</th>
              <th>Participantes</th>
              <th>Visualizar</th>
              <th>Excluir</th>
            </tr>
          </thead> 

          <?php while($d->valid()){?>

          <tbody> 
            <tr> 
              <td><?php echo $d->current()->id_actividade. "<br />"; ?></td> 
              
              <td><?php echo $d->current()->data_actividade. "<br />"; ?></td>
              <td><?php echo $d->current()->hora_actividade. "<br />"; ?></td>
              <td><?php echo $d->current()->tipo_de_actividade. "<br />"; ?></td>
              <td><?php echo $d->current()->objectivo_actividade. "<br />"; ?></td>
              <td><?php echo $d->current()->local_actividade. "<br />"; ?></td>
              <td><?php echo $d->current()->responsavel_actividade. "<br />"; ?></td>
              <td><?php echo $d->current()->participantes_actividade. "<br />"; ?></td>
              <td><a href="#">Visualizar Actividade</a></td>
              <td><a href="?id_actividade=<?php echo $d->current()->id_actividade;?>&ac=del">Excluir Dados</a></td>
              
            </tr> 
            <?php
            $d->next();
            }?>
          </tbody> 
        </table>
      </div>
    </div>
    <!-- Tabela de Actividades End -->

  <!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>
    

    