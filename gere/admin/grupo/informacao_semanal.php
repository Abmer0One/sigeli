<?php
      include_once 'menu.php';
    ?>
    <!-- Header -->

    <!-- Tabela de Informação Semanal -->
  <div class="container">

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_informacao_semanal.php" class="btn btn-primary">Registar Informação Semanal</a> 
        </div>
    </div>

    <hr>
    <div class="row mx-3 mb-5">
      <!-- Criaçao da Tabela de listagem com dados da base de dados -->
      <div class="mycontent-left mb-5">
        <table class="table table-dark md-3 mx-3"> 
          <?php 
          $dados = listarPDOinformacaoSemanalAll(); 
          $d = new ArrayIterator($dados);?>

          <!-- Exclusao de dados da base de dados -->
          <?php
            try{
              if(isset($_GET['ac'])){
                if($_GET['ac'] == 'del'){
                  $id_informacao_semanal = filter_input(INPUT_GET, 'id_informacao_semanal', FILTER_SANITIZE_NUMBER_INT);
                  $id_informacao_semanal = filter_var($id_informacao_semanal, FILTER_VALIDATE_INT);
                  if($id_informacao_semanal){
                    if(deletarPDOinformacaoSemanal($id_informacao_semanal)){
                      echo "<script>alert(' Informação Semanal deletada com sucesso');window.location.href='informacao_semanal.php';</script>";
                    }else{
                      throw new Exception('Erro ao deletar a Informação Semanal');
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
              <th>Titulo sobre Papa</th> 
              <th>Titulo sobre Liturgia</th>
              <th>Titulo sobre outras informações</th>
              <th>Visualizar</th>
              <th>Excluir</th>
            </tr>
          </thead> 

          <?php while($d->valid()){?>

          <tbody> 
            <tr> 
              <td><?php echo $d->current()->id_informacao_semanal. "<br />"; ?></td> 
              <td><?php echo $d->current()->titulo_info_papa. "<br />"; ?></td>
              <td><?php echo $d->current()->titulo_info_liturgia. "<br />"; ?></td>
              <td><?php echo $d->current()->titulo_info_outro. "<br />"; ?></td>
              <td><a href="ver_informacao_semanal.php?id_informacao_semanal=<?php echo $d->current()->id_informacao_semanal;?>">Visualizar Infromações Semanais</a></td>
              <td><a href="?id_informacao_semanal=<?php echo $d->current()->id_informacao_semanal;?>&ac=del">Excluir Dados</a></td>
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
    

    