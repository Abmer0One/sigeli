
<?php
  include_once 'menu.php';
	$dados = listarPDOescalaProclamadores(); 
	$d = new ArrayIterator($dados);
?>

      <div class="row">
			<div class="col-xl-12">
				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Escala de Proclamadores das Missas</h3>
                </div>
                <div class="col text-right">
                  <a href="proclamadores_da_missa.php" class="btn btn-primary">Registar Escala</a> 
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Data de Proclamação</th>
                    <th scope="col">Tempo Liturgico</th>
                    <th scope="col">Dia de Proclamação</th>
                    <th scope="col">Hora de Proclamação</th>
                    <th scope="col">Proclamador da 1ª Leitura</th>
                    <th scope="col">Proclamador do Salmo Responsorial</th>
                    <th scope="col">Proclamador da 2ª Leitura</th>
                    <th scope="col">Proclamador das Preces</th>
                    <th scope="col">Monitor</th>
                    <th scope="col">Alterar</th>
                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
										<th scope="row"><?php echo $d->current()->data_proclamacao. "<br />"; ?></th>

										<?php 
											$dadosa = pegarPeloIDComPDOtempoLiturgico($d->current()->tempo_liturgico_proclamacao); 
											$dc = new ArrayIterator($dadosa);
											if($dc->current()->descrisao_nome_tempo && $dc->current()->descrisao_ano_tempo){
										 ?>
                    <td><?php echo $dc->current()->descrisao_nome_tempo. " - " .$dc->current()->descrisao_ano_tempo."<br/>"; ?><?php }?></td>

                    <td><?php echo $d->current()->dia_proclamacao. "<br />"; ?></td>
                    <td><?php echo $d->current()->hora_proclamacao. "<br />"; ?></td>

                    <?php 
											$dados1leitura = pegarPeloIDComPDOmembro($d->current()->proclamador_primeira_leitura); 
											$d1leitura = new ArrayIterator($dados1leitura);
											if($d1leitura->current()->nome_membro){
										 ?>
                    <td><?php echo $d1leitura->current()->nome_membro."<br/>"; ?><?php }?></td>

                    <?php 
											$dadosSalmo = pegarPeloIDComPDOmembro($d->current()->proclamador_salmo_responsorial); 
											$dsalmo = new ArrayIterator($dadosSalmo);
											if($dsalmo->current()->nome_membro){
										 ?>
                    <td><?php echo $dsalmo->current()->nome_membro."<br/>"; ?><?php }?></td>

                    <?php 
											$dados2leitura = pegarPeloIDComPDOmembro($d->current()->proclamador_segunda_leitura); 
											$d2leitura = new ArrayIterator($dados2leitura);
											if($d2leitura->current()->nome_membro){
										 ?>
                    <td><?php echo $d2leitura->current()->nome_membro."<br/>"; ?><?php }?></td>

                    <?php 
											$dadospreces = pegarPeloIDComPDOmembro($d->current()->proclamador_preces); 
											$dpreces = new ArrayIterator($dadospreces);
											if($dpreces->current()->nome_membro){
										 ?>
                    <td><?php echo $dpreces->current()->nome_membro."<br/>"; ?><?php }?></td>

                    <?php 
											$dadosmonitor = pegarPeloIDComPDOmembro($d->current()->monitor); 
											$dmonitor = new ArrayIterator($dadosmonitor);
											if($dmonitor->current()->nome_membro){
									 	?>
                    <td><?php echo $dmonitor->current()->nome_membro."<br/>"; ?><?php }?></td>

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

