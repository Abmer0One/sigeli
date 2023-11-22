
<?php

  include_once 'menu.php';
	$dados = pegarPeloIDComPDOMembroComissao($_SESSION['tipo_nivel']);  
	$d = new ArrayIterator($dados);
?>
	
	<div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista dos Membros</h3>
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
                    <th scope="col">Nome</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Morada</th>
                    <th scope="col">Data de Inicio</th>
                    <th scope="col">Ver +</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->nome_membro. "<br />"; ?></th>
                    <?php 
											$dadosa = pegarPeloIDComPDOgrupo($d->current()->id_grupo); 
											$dc = new ArrayIterator($dadosa);
											if($dc->current()->nome_grupo){
										 ?>
										<td><?php echo $dc->current()->nome_grupo. "<br />"; ?><?php }?></td>
                    <td><?php echo $d->current()->data_nascimento_membro. "<br />"; ?></td>
										<td><?php echo $d->current()->telefone_membro. "<br />"; ?></td>
										<td><?php echo $d->current()->email_membro. "<br />"; ?></td>
										<td><?php echo $d->current()->endereco_membro. "<br />"; ?></td>
										<td><?php echo $d->current()->data_inicio_membro. "<br />"; ?></td>
										<td><a href="ver_membro.php?idMembro=<?php echo $d->current()->id_membro;?>">Ver Detalhes</a></td>
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

