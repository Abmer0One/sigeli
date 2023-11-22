
<?php
	include_once 'menu.php';
?>
<div class="container">
	<div class="row ">

		<!-- Criaçao da Tabela de listagem com dados da base de dados -->
		
		<div class="mycontent-left mb-5">
			<table class="table table-dark md-3 mx-5"> 
				<?php 
				$dados = listarPDOcoordenador(); 
				$d = new ArrayIterator($dados);?>

				<!-- Exclusao de dados da base de dados -->
				<?php
					try{
						if(isset($_GET['ac'])){
							if($_GET['ac'] == 'del'){
								$id_grupo = filter_input(INPUT_GET, 'id_grupo', FILTER_SANITIZE_NUMBER_INT);
								$id_grupo = filter_var($id_grupo, FILTER_VALIDATE_INT);
								if($id_grupo){
									if(deletarPDOgrupo($id_grupo)){
										echo "<script>alert(' Grupo deletado com sucesso');window.location.href='registar_grupos.php';</script>";
									}else{
										throw new Exception('Erro ao deletar Grupo');
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

				<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
		          <h1>Lista dos Coordenadores</h1> 
		        </div>
				
				<thead> 
					<tr> 
						<th>ID</th>
						<th>Nome</th> 
						<th>Grupo</th> 
						<th>Cargo</th>
						<th>Função</th> 
						<th>Inicio</th>
						<th>Fim</th>
						<th>Excluir</th>
					</tr> 
				</thead> 

				<?php while($d->valid()){?>

				<tbody> 
					<tr> 
						<td><?php echo $d->current()->id_coordenador. "<br />"; ?></td> 
						<?php 
							$dados_m = pegarPeloIDComPDOmembro($d->current()->membro_coordenador_id); 
							$d_m = new ArrayIterator($dados_m);?>
							<?php while($d_m->valid()){?>
							<td>
								<?php echo $d_m->current()->nome_membro. "<br/>"; ?><?php $d_m->next(); }?>
							</td>

							<?php 
								$dados_g = pegarPeloIDComPDOgrupo($d->current()->grupo_coordenador_id); 
								$d_g = new ArrayIterator($dados_g);?>
								<?php while($d_g->valid()){?>
								<td>
									<?php echo $d_g->current()->nome_grupo. "<br/>"; ?><?php $d_g->next(); }?>
								</td>
						<td><?php echo $d->current()->cargo_coordenador. "<br />"; ?></td>
						<td><?php echo $d->current()->descricao_cargo_coordenador. "<br />"; ?></td>
						<td><?php echo $d->current()->data_inicio_coordenador. "<br />"; ?></td>
						<td><?php echo $d->current()->data_fim_coordenador. "<br />"; ?></td>
						<td><a href="?id_coordenador=<?php echo $d->current()->id_coordenador;?>&ac=del">Excluir Dados</a></td>
					</tr> 
					<?php
					$d->next();
					}?>


					<?php 
						if (isset($_GET['form'])) {
						 	if ($_GET['form'] == '1') {
						 		$id_grupo = filter_input(INPUT_GET, 'id_grupo',FILTER_SANITIZE_NUMBER_INT);
						 		$id_grupo = filter_var($id_grupo, FILTER_VALIDATE_INT);

						 		if($id_grupo)
						 			$dados = pegarPeloIDComPDOmedicamento($id_grupo);
					?>
									<form action="alterar.php" method="POST">
										 	<tr>
										 		<th><input type="hidden" name="id_grupo" value="<?php echo $dados->id_grupo; ?>"></th>
										 		<th><input type="text" name="nome" value="<?php echo $dados->nome; ?>"></th>
										 		<th><input type="number" name="preco" value="<?php echo $dados->preco; ?>"></th>
										 		<th><input type="data-toggle" name="data_de_exp" value="<?php echo $dados->data_de_exp; ?>"></th>
										 		<th><input type="number" name="categoria_id" value="<?php echo $dados->categoria_id; ?>"></th>
										 		<th><input type="number" name="linhagem_id" value="<?php echo $dados->linhagem_id; ?>"></th>
										 		<th><input type="number" name="farmacia_id" value="<?php echo $dados->farmacia_id; ?>"></th>
										 	</tr>
									</form>
							
						 			<?php
						 		}
						 	} ?>
				</tbody> 
			</table>
		</div>
	</div>
	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>

