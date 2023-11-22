
<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$nome_tipo_grupo = $_POST['nome_tipo_grupo'];
		$id_comissao = $_POST['id_comissao'];

		if(cadastrarPDOtipogrupo($nome_tipo_grupo, $id_comissao)){
			echo "Tipo de Grupo cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='tipogrupo.php';</script>";
		}else{
			echo "Erro ao cadastrar o Tipo de Grupo...";
		}
	}

		
	 ?>


	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row ">
			<div class="col mx-3">
				<div class="mycontent-left">
					<form method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="fieldset mx-2">
								<legend class="legend mx-2 mb-2">Definir Tipo de Grupo</legend>
						  		<div class="form-row">
						    		<div class="col-md-6 mx-3 my-3">
						      			<input type="text" class="form-control" name="nome_tipo_grupo" id="nome_tipo_grupo" placeholder="Nome do Tipo de Grupo">
						    		</div>

						    		<div class="form-group mx-3 my-3">
						  				<?php 
										$dadosg = listarPDOcomissao(); 
										$dg = new ArrayIterator($dadosg);?>
						      			<select type="number" id="id_comissao" name="id_comissao" class="form-control" required> 
											<option value="<?php echo $dg->current()->id_comissao;?>">Comissão</option>
											<?php while($dg->valid()){?>
											<option value="<?php echo $dg->current()->id_comissao; ?>"><?php echo $dg->current()->nome_comissao. "<br/>"; ?><?php $dg->next(); }?> </option>
										</select>
									</div>
								</div>  
								<hr>
								<button type="submit" name="btRegistar" id="btRegistar" class="btn btn-primary mx-3 mb-4" value="registar">Registar</button>
								<button type="submit" id="btCancelar" class="btn btn-danger mx-3 mb-4">Cancelar</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>

			<div class="col mx-3 mb-5">
				<!-- Criaçao da Tabela de listagem com dados da base de dados -->
				<div class="mycontent-left mb-5">
					<table class="table table-dark md-3 mx-3"> 
						<?php 
						$dados = listarPDOtipogrupo(); 
						$d = new ArrayIterator($dados);?>

						<!-- Exclusao de dados da base de dados -->
						<?php
							try{
								if(isset($_GET['ac'])){
									if($_GET['ac'] == 'del'){
										$id_tipo_grupo = filter_input(INPUT_GET, 'id_tipo_grupo', FILTER_SANITIZE_NUMBER_INT);
										$id_tipo_grupo = filter_var($id_tipo_grupo, FILTER_VALIDATE_INT);
										if($id_tipo_grupo){
											if(deletarPDOtipogrupo($id_tipo_grupo)){
												echo "<script>alert(' Tipo de Grupo deletado com sucesso');window.location.href='tipogrupo.php';</script>";
											}else{
												throw new Exception('Erro ao deletar Tipo de Grupo');
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
								<th>Nome</th> 
								<th>Comissão</th>
								<th>Excluir</th>
							</tr> 
						</thead> 

						<?php while($d->valid()){?>

						<tbody> 
							<tr> 
								<td><?php echo $d->current()->id_tipo_grupo. "<br />"; ?></td> 
								
								<td><?php echo $d->current()->nome_tipo_grupo. "<br />"; ?></td>
								<?php 
									$dadosa = pegarPeloIDComPDOcomissao($d->current()->id_comissao); 
									$dc = new ArrayIterator($dadosa);
									if($dc->current()->nome_comissao){
								 ?>
			                    <td><?php echo $dc->current()->nome_comissao. "<br />"; ?><?php }?></td>
								<td><a href="?id_tipo_grupo=<?php echo $d->current()->id_tipo_grupo;?>&ac=del">Excluir Dados</a></td>
								
							</tr> 
							<?php
							$d->next();
							}?>
						</tbody> 
					</table>
				</div>
			</div>
		</div>

	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>

