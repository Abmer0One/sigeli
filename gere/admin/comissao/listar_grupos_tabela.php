
<?php
	include_once 'menu.php';
?>


	<!-- Listagem de Grupos -->
	<?php 
				$dados = pegarPeloIDComPDOgrupoComissao($_SESSION['tipo_nivel']); 
				$d = new ArrayIterator($dados);?>

<div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista dos Grupos</h3>
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
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Comissão</th>
                    <th scope="col">Carisma</th>
                    <th scope="col">Fundação</th>
                    <th scope="col">Padroeiro</th>
                    <th scope="col">Regulamento</th>
                    <th scope="col">Ver +</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                  	<td>
											<span class="avatar avatar rounded-circle">
					              	<img alt="Image placeholder" src="../Imagem_grupo/<?=$d->current()->imagem_grupo?>".>
					           	</span>
										</td>
                    <th scope="row"><?php echo $d->current()->nome_grupo. "<br />"; ?></th>
                    <?php 
											$dadosa = pegarPeloIDComPDOtipogrupo($d->current()->id_tipo_grupo); 
											$dc = new ArrayIterator($dadosa);
											if($dc->current()->nome_tipo_grupo){
										 ?>
					                      
										<td><?php echo $dc->current()->nome_tipo_grupo. "<br />"; ?><?php }?></td>
                    <?php 
											$dadosa = pegarPeloIDComPDOcomissao($d->current()->id_comissao); 
											$dc = new ArrayIterator($dadosa);
											if($dc->current()->nome_comissao){
										 ?>
                    <td><?php echo $dc->current()->nome_comissao. "<br />"; ?><?php }?></td>
                    <td><?php echo $d->current()->carisma_grupo. "<br />"; ?></td>
										<td><?php echo $d->current()->fundacao_grupo. "<br />"; ?></td>
										<td><?php echo $d->current()->padroeiro_grupo. "<br />"; ?></td>
										<td><?php echo $d->current()->regulamento_grupo. "<br />"; ?></td>
										<td><a href="ver_grupo.php?idGrupo=<?php echo $d->current()->id_grupo;?>">Ver +</a></td></td>
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

