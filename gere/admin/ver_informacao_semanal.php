<?php
      include_once 'menu.php';
    ?>
    <!-- Header -->

    <!-- Recebe os dados da lista de grupos -->
    <?php 
      $id_informacao_semanal = $_GET['id_informacao_semanal'];
    ?>

<div >
  <?php 
    $dados = pegarPeloIDComPDOinformacaoSemanal($id_informacao_semanal); 
    $d = new ArrayIterator($dados);?>
                
  <h4 class="modal-title h4" id="exampleModalFullscreenLabel">Informação Semanal</h4> 
             
  <?php while($d->valid()){?>
  <div class="modal-body">
    <div class="dropdown-divider"></div>
    <div class="row">  
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
          <h4 id="scrollspyHeading1"><?php echo $d->current()->titulo_info_papa. "<br />"; ?></h4>
          <p><?php echo $d->current()->informacao_papa. "<br />"; ?></p>
          <h4 id="scrollspyHeading2"><?php echo $d->current()->titulo_info_liturgia. "<br />"; ?></h4>
          <p><?php echo $d->current()->informacao_liturgia. "<br />"; ?></p>
          <h4 id="scrollspyHeading3"><?php echo $d->current()->titulo_info_outro. "<br />"; ?></h4>
          <p><?php echo $d->current()->informacao_outro. "<br />"; ?></p>
        </div>
    </div>
  </div>
  <?php
  $d->next();
  }?>
</div>

<!-- Footer -->
<?php
  include_once 'rodape.php';
?>
              