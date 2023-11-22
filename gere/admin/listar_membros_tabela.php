
<?php
    include_once 'menu.php';
    ?>
	<!-- Formulario de registro de Membros -->
<div class="container">
	<div class="row ">
		<!-- Criaçao da Tabela de listagem com dados da base de dados -->
		
		<div class="mycontent-left mb-5">
			<table class="table table-dark md-3"> 
				<?php 
				$dados = listarPDOmembro(); 
				$d = new ArrayIterator($dados);?>

				<!-- Exclusao de dados da base de dados -->
				<?php
					try{
						if(isset($_GET['ac'])){
							if($_GET['ac'] == 'del'){
								$id_membro = filter_input(INPUT_GET, 'id_membro', FILTER_SANITIZE_NUMBER_INT);
								$id_membro = filter_var($id_membro, FILTER_VALIDATE_INT);
								if($id_membro){
									if(deletarPDOmembro($id_membro)){
										echo "<script>alert(' Membro deletado com sucesso');window.location.href='registar_membros.php';</script>";
									}else{
										throw new Exception('Erro ao deletar Membro');
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
			      <h1>Lista dos Membros</h1> 
			    </div>
				
				<thead> 
					<tr> 
						<th>Nome</th> 
						<th>Grupo</th> 
						<th>Data de Nascimento</th>
						<th>Telefone</th> 
						<th>Email</th>
						<th>Morada</th>
						<th>Data de Inicio</th>
						<th>Ver +</th>
						<th>Excluir</th>
					</tr> 
				</thead> 

				<?php while($d->valid()){?>

				<tbody> 
					<tr> 
						<td><?php echo $d->current()->nome_membro. "<br />"; ?></td>

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
						<td><a href="?id_membro=<?php echo $d->current()->id_membro;?>&ac=del">Excluir Dados</a></td>
						
					</tr> 
					<?php
					$d->next();
					}?>


					<?php 
						if (isset($_GET['form'])) {
						 	if ($_GET['form'] == '1') {
						 		$id_membro = filter_input(INPUT_GET, 'id_membro',FILTER_SANITIZE_NUMBER_INT);
						 		$id_membro = filter_var($id_membro, FILTER_VALIDATE_INT);

						 		if($id_membro)
						 			$dados = pegarPeloIDComPDOmedicamento($id_membro);
					?>
									<form action="alterar.php" method="POST">
										 	<tr>
										 		<th><input type="hidden" name="id_membro" value="<?php echo $dados->id_membro; ?>"></th>
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

