
<?php
    include_once 'menu.php';
    ?>
	


	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">

		<div class="row my-2">
		    <div class="col d-flex flex-column align-items-center text-center">
		      <a href="leituras.php" class="btn btn-primary">Publicar Leituras</a> 
		    </div>
		</div>

		<hr>
		<div class="row mx-3 mb-5">
			<!-- Criaçao da Tabela de listagem com dados da base de dados -->
			<div class="mycontent-left mb-5">
				<table class="table table-dark md-3 mx-3"> 
					<?php 
					$dados = listarPDOleituras(); 
					$d = new ArrayIterator($dados);?>

					<!-- Exclusao de dados da base de dados -->
					<?php
						try{
							if(isset($_GET['ac'])){
								if($_GET['ac'] == 'del'){
									$id_leituras = filter_input(INPUT_GET, 'id_leituras', FILTER_SANITIZE_NUMBER_INT);
									$id_leituras = filter_var($id_leituras, FILTER_VALIDATE_INT);
									if($id_leituras){
										if(deletarPDOleituras($id_leituras)){
											echo "<script>alert(' Leituras deletadas com sucesso');window.location.href='listar_leituras.php';</script>";
										}else{
											throw new Exception('Erro ao deletar as Leituras');
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

					<h2 class="mx-3">Lista de Tipos de Grupos</h2> 
					
					<thead> 
						<tr>
							<th>ID</th>
							<th>Data</th> 
							<th>Tempo iturgico</th>
							<th>Titulo Primeira Leitura</th>
							<th>Primeira Leitura</th>
							<th>Titulo Salmo Responsorial</th>
							<th>Salmo Responsorial</th>
							<th>Titulo Segunda Leitura</th>
							<th>Segunda Leitura</th>
							<th>Titulo Oração dos Fieis</th>
							<th>Oração dos Fieis</th>
							<th>Titulo Evangelho</th>
							<th>Evangelho</th>
							<th>Visualizar</th>
							<th>Excluir</th>
						</tr> 
					</thead> 

					<?php while($d->valid()){?>

					<tbody> 
						<tr> 
							<td><?php echo $d->current()->id_leituras. "<br />"; ?></td> 
							
							<td><?php echo $d->current()->data_leitura. "<br />"; ?></td>
							<?php 
								$dadosa = pegarPeloIDComPDOtempoLiturgico($d->current()->tempo_liturgico); 
								$dc = new ArrayIterator($dadosa);
								if($dc->current()->descrisao_tempo_liturgico && $dc->current()->descrisao_nome_tempo && $dc->current()->descrisao_ano_tempo){
							 ?>
		                    <td><?php echo $dc->current()->descrisao_tempo_liturgico. " - " .$dc->current()->descrisao_nome_tempo. " - " .$dc->current()->descrisao_ano_tempo."<br/>"; ?><?php }?></td>

		                    <td><?php echo $d->current()->titulo_primeira_leitura. "<br />"; ?></td>
		                    <td><?php echo $d->current()->primeira_leitura. "<br />"; ?></td>
		                    <td><?php echo $d->current()->titulo_salmo. "<br />"; ?></td>
		                    <td><?php echo $d->current()->salmo_responsorial. "<br />"; ?></td>
		                    <td><?php echo $d->current()->titulo_segunda_leitura. "<br />"; ?></td>
		                    <td><?php echo $d->current()->segunda_leitura. "<br />"; ?></td>
		                    <td><?php echo $d->current()->titulo_preces. "<br />"; ?></td>
		                    <td><?php echo $d->current()->oracao_dos_fieis. "<br />"; ?></td>
		                    <td><?php echo $d->current()->titulo_evangelho. "<br />"; ?></td>
		                    <td><?php echo $d->current()->evangelho. "<br />"; ?></td>
		                    <td><a href="?id_leituras=<?php echo $d->current()->id_leituras;?>">Visualizar Leituras</a></td>
							<td><a href="?id_leituras=<?php echo $d->current()->id_leituras;?>&ac=del">Excluir Dados</a></td>
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

