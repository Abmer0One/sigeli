
<?php
    include_once 'menu.php';
    ?>
	
	<!-- Formulario de registro de Escala de Missa -->
	<div class="container">

		<div class="row my-2">
		    <div class="col d-flex flex-column align-items-center text-center">
		      <a href="padres_da_missa.php" class="btn btn-primary">Registar Escala</a> 
		    </div>
		</div>

		<hr>
		<div class="row mx-3 mb-5">
			<!-- Criaçao da Tabela de listagem com dados da base de dados -->
			<div class="mycontent-left mb-5">
				<table class="table table-dark md-3 mx-3"> 
					<?php 
					$dados = listarPDOescalaPadres(); 
					$d = new ArrayIterator($dados);?>

					<!-- Exclusao de dados da base de dados -->
					<?php
						try{
							if(isset($_GET['ac'])){
								if($_GET['ac'] == 'del'){
									$id_escala_padre = filter_input(INPUT_GET, 'id_escala_padre', FILTER_SANITIZE_NUMBER_INT);
									$id_escala_padre = filter_var($id_escala_padre, FILTER_VALIDATE_INT);
									if($id_escala_padre){
										if(deletarPDOescalaPadre($id_escala_padre)){
											echo "<script>alert(' Escala deletada com sucesso');window.location.href='listar_escala_padres.php';</script>";
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

					<h2 class="mx-3">Escala de Padres das Missas</h2> 
					
					<thead> 
						<tr> 
							<th>ID</th>
							<th>Data de Celebração</th> 
							<th>Tempo Liturgico</th>
							<th>Nome do Padre</th>
							<th>Dia de Celebração</th>
							<th>Hora de Celebração</th>
							<th>Excluir</th>
						</tr> 
					</thead> 

					<?php while($d->valid()){?>
						
					<tbody> 
						<tr>
							<td><?php echo $d->current()->id_escala_padre. "<br />"; ?></td> 
							
							<td><?php echo $d->current()->data_celebracao. "<br />"; ?></td>

							<?php 
								$dadosa = pegarPeloIDComPDOtempoLiturgico($d->current()->tempo_liturgico_celebracao); 
								$dc = new ArrayIterator($dadosa);
								if($dc->current()->descrisao_nome_tempo && $dc->current()->descrisao_ano_tempo){
							 ?>
		                    <td><?php echo $dc->current()->descrisao_nome_tempo. " - " .$dc->current()->descrisao_ano_tempo."<br/>"; ?><?php }?></td>

		                    <td><?php echo $d->current()->nome_padre_celebracao. "<br />"; ?></td>
		                    <td><?php echo $d->current()->dia_celebracao. "<br />"; ?></td>
		                    <td><?php echo $d->current()->hora_celebracao. "<br />"; ?></td>
							<td><a href="?id_escala_padre=<?php echo $d->current()->id_escala_padre;?>&ac=del">Excluir Dados</a></td>
							
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

