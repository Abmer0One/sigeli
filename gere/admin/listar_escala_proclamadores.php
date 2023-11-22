
<?php
    include_once 'menu.php';
    ?>
	
	<!-- Formulario de registro de Escala de Missa -->
	<div class="container">

		<div class="row my-2">
		    <div class="col d-flex flex-column align-items-center text-center">
		      <a href="proclamadores_da_missa.php" class="btn btn-primary">Registar Escala</a> 
		    </div>
		</div>

		<hr>
		<div class="row mx-3 mb-5">
			<!-- Criaçao da Tabela de listagem com dados da base de dados -->
			<div class="mycontent-left mb-5">
				<table class="table table-dark md-3 mx-3"> 
					<?php 
					$dados = listarPDOescalaProclamadores(); 
					$d = new ArrayIterator($dados);?>

					<!-- Exclusao de dados da base de dados -->
					<?php
						try{
							if(isset($_GET['ac'])){
								if($_GET['ac'] == 'del'){
									$id_escala_proclamador = filter_input(INPUT_GET, 'id_escala_proclamador', FILTER_SANITIZE_NUMBER_INT);
									$id_escala_proclamador = filter_var($id_escala_proclamador, FILTER_VALIDATE_INT);
									if($id_escala_proclamador){
										if(deletarPDOescalaProclamadores($id_escala_proclamador)){
											echo "<script>alert(' Escala deletada com sucesso');window.location.href='listar_escala_proclamadores.php';</script>";
										}else{
											throw new Exception('Erro ao deletar a Escala');
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

					<h2 class="mx-3">Escala de Proclamadores das Missas</h2> 
					
					<thead> 
						<tr> 
							<th>ID</th>
							<th>Data de Proclamação</th> 
							<th>Tempo Liturgico</th>
							<th>Dia de Proclamação</th>
							<th>Hora de Proclamação</th>
							<th>Proclamador da 1ª Leitura</th>
							<th>Proclamador do Salmo Responsorial</th>
							<th>Proclamador da 2ª Leitura</th>
							<th>Proclamador das Preces</th>
							<th>Monitor</th>
							<th>Excluir</th>
						</tr> 
					</thead> 

					<?php while($d->valid()){?>

					<tbody> 
						<tr>
							<td><?php echo $d->current()->id_escala_proclamador. "<br />"; ?></td> 
							
							<td><?php echo $d->current()->data_proclamacao. "<br />"; ?></td>

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

							<td><a href="?id_escala_proclamador=<?php echo $d->current()->id_escala_proclamador;?>&ac=del">Excluir Dados</a></td>
							
						</tr> 
						<?php
						$d->next();
						}?>
					</tbody> 
				</table>
			</div>
		</div>
		

	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>

