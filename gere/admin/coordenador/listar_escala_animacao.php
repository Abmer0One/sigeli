
<?php
    include_once 'menu.php';
    ?>
	
	<!-- Formulario de registro de Escala de Missa -->
	<div class="container">

		<div class="row my-2">
		    <div class="col d-flex flex-column align-items-center text-center">
		      <a href="animacao_das_missas.php" class="btn btn-primary">Registar Escala</a> 
		    </div>
		</div>

		<hr>
		<div class="row mx-3 mb-5">
			<!-- Criaçao da Tabela de listagem com dados da base de dados -->
			<div class="mycontent-left mb-5">
				<table class="table table-dark md-3 mx-3"> 
					<?php 
					$dados = listarPDOescalaAnimacao(); 
					$d = new ArrayIterator($dados);?>

					<!-- Exclusao de dados da base de dados -->
					<?php
						try{
							if(isset($_GET['ac'])){
								if($_GET['ac'] == 'del'){
									$id_escala_animacao = filter_input(INPUT_GET, 'id_escala_animacao', FILTER_SANITIZE_NUMBER_INT);
									$id_escala_animacao = filter_var($id_escala_animacao, FILTER_VALIDATE_INT);
									if($id_escala_animacao){
										if(deletarPDOescalaAnimacao($id_escala_animacao)){
											echo "<script>alert(' Escala deletada com sucesso');window.location.href='listar_escala_animacao.php';</script>";
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

					<h2 class="mx-3">Escala de Animação das Missas</h2> 
					
					<thead> 
						<tr> 
							<th>ID</th>
							<th>Data de Animação</th> 
							<th>Tempo Liturgico</th>
							<th>Grupo Coral</th>
							<th>Dia de Animação</th>
							<th>Hora de Animação</th>
							<th>Excluir</th>
						</tr> 
					</thead> 

					<?php while($d->valid()){?>

					<tbody> 
						<tr>
							<td><?php echo $d->current()->id_escala_animacao. "<br />"; ?></td> 
							
							<td><?php echo $d->current()->data_escala_animacao. "<br />"; ?></td>

							<?php 
								$dadosa = pegarPeloIDComPDOtempoLiturgico($d->current()->escala_tempo_liturgico); 
								$dc = new ArrayIterator($dadosa);
								if($dc->current()->descrisao_nome_tempo && $dc->current()->descrisao_ano_tempo){
							 ?>
		                    <td><?php echo $dc->current()->descrisao_nome_tempo. " - " .$dc->current()->descrisao_ano_tempo."<br/>"; ?><?php }?></td>

		                    <?php 
								$dadosGrupo = pegarPeloIDComPDOgrupo($d->current()->grupo_coral_animador); 
								$dgrupo = new ArrayIterator($dadosGrupo);
								if($dgrupo->current()->nome_grupo){
							 ?>
		                    <td><?php echo $dgrupo->current()->nome_grupo."<br/>"; ?><?php }?></td>

		                    <td><?php echo $d->current()->dia_escala_animacao. "<br />"; ?></td>
		                    <td><?php echo $d->current()->hora_escala_animacao. "<br />"; ?></td>
							<td><a href="?id_escala_animacao=<?php echo $d->current()->id_escala_animacao;?>&ac=del">Excluir Dados</a></td>
							
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

