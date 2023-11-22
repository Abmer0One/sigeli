
<?php
	include_once 'menu.php';
	$dados = listarPDOcomissao(); 
	$d = new ArrayIterator($dados);
?>

<div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="mb-0">Lista das Comissões</h2>
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
                    <th scope="col">Detalhes</th>
                    <th scope="col">Regulamento</th>
                    <th scope="col">Ver detalhes</th>
                    <th scope="col">Alterar Dados</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <td>
											<span class="avatar avatar rounded-circle">
	                    	<img alt="Image placeholder" src="../Imagem_comissao/<?=$d->current()->imagem_comissao?>".>
		                 	</span>
										</td>
										<th scope="row"><?php echo $d->current()->nome_comissao. "<br />"; ?></th>
										<td><?php echo $d->current()->detalhes_comissao. "<br />"; ?></td>
										<td><?php echo $d->current()->regulamento_comissao. "<br />"; ?></td>
										<td><a href="ver_comissao.php?idComissao=<?php echo $d->current()->id_comissao;?>&nomeComissao=<?php echo $d->current()->nome_comissao;?>&detalheComissao=<?php echo $d->current()->detalhes_comissao;?>&regulamentoComissao=<?php echo $d->current()->regulamento_comissao;?>&fotoComissao=<?php echo $d->current()->imagem_comissao?>">Ver detalhes</a></td></td>
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

