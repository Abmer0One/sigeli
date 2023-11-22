
<?php
    include_once 'menu.php';
    ?>

    <?php 
		$id_grupo = $_GET['grupoId'];
	?>


	<?php 
		if(isset($_POST['btActualizar'])){
			$nome_grupo = $_POST['nome_grupo'];
			$carisma_grupo = $_POST['carisma_grupo'];
			$fundacao_grupo = $_POST['fundacao_grupo'];
			$padroeiro_grupo = $_POST['padroeiro_grupo'];
			$tipo_grupo = $_POST['tipo_grupo'];
			$id_comissao = $_POST['id_comissao'];

			
			
			if(isset($_FILES['arquivo'])){
			    $arquivo = $_FILES['arquivo']['name'];
			    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
			    $imagem_grupo = $nome_grupo.".".$extensao;
			    $diretorio = "Imagem_grupo/";
			    
			    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $imagem_grupo);
			}

			if (isset($_FILES['arquivo_regulamento'])) {
				$arquivo_regulamento = $_FILES['arquivo_regulamento']['name'];
				$extensao_r = strtolower(pathinfo($arquivo_regulamento, PATHINFO_EXTENSION));
				$regulamento_grupo =$nome_grupo.".".$extensao_r;
				$diretorio = "Regulamento_grupo/";

				move_uploaded_file($_FILES['arquivo_regulamento']['tmp_name'], $diretorio. $regulamento_grupo);
			}

			if(alterarPDOgrupo($nome_grupo, $carisma_grupo, $imagem_grupo, $regulamento_grupo, $fundacao_grupo, $padroeiro_grupo, $tipo_grupo, 0, $id_comissao)){
				echo "Grupo actualizado com sucesso...";
				echo "<script>alert('Inscrição feita com sucesso');window.location.href='ver_grupo.php';</script>";
			}else{
				echo "Erro ao actualizar o Grupo...";
			}
		}
	?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_grupos.php" class="btn btn-primary">Listar Grupos</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_grupos_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>

    <?php 
    	
		
			$dados = pegarPeloIDComPDOgrupo($id_grupo);
	    	$d = new ArrayIterator($dados);
	?>

	
	<!-- registro de Grupo na Base de dados com php -->
	<div class="container">
		<div class="row ">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<?php if($d->valid()){?>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Actualizar os Dados do Grupo</legend>
					  		<div class="form-row">
					    		<div class="col-md-4 mb-3">
					      			<input type="text" class="form-control" name="nome_grupo" id="nome_grupo" value="<?php echo $d->current()->nome_grupo; ?>" >
					      			<input type="hidden" class="form-control" name="id_grupo" id="id_grupo" value="<?php echo $d->current()->id_grupo; ?>" >
					    		</div>

					    		<div class="form-group mx-3">
				  				<?php 
								$dadosg = listarPDOcomissao(); 
								$dg = new ArrayIterator($dadosg);?>
				      			<select type="number" id="id_comissao" name="id_comissao" class="form-control" required> 
									<option value="<?php echo $dg->current()->id_comissao;?>">Comissão</option>
									<?php while($dg->valid()){?>
									<option value="<?php echo $dg->current()->id_comissao; ?>"><?php echo $dg->current()->nome_comissao. "<br/>"; ?><?php $dg->next(); }?> </option>
								</select>
							</div>

								<div class="col-md-4 mb-3">
					  				<input type="text" class="form-control" name="carisma_grupo" id="carisma_grupo" value="<?php echo $d->current()->carisma_grupo; ?>">
								</div>
								<div class="col-md-4 mb-3">
					  				<input type="date" class="form-control" name="fundacao_grupo" id="fundacao_grupo" value="<?php echo $d->current()->fundacao_grupo; ?>">
								</div>
								</div>
								<div class="form-row">
								<div class="col-md-4 mb-3">
					      			<input type="text" class="form-control" name="padroeiro_grupo" id="padroeiro_grupo" value="<?php echo $d->current()->padroeiro_grupo; ?>">
					    		</div>
					    		<div class="col-md-4 mb-3">
									<select type="text" id="tipo_grupo" name="tipo_grupo" value="<?php echo $d->current()->tipo_grupo; ?>" class="form-control">
									<option selected>Tipo</option>
									<option>Acólitos</option>
									<option>Acolhimento</option>
									<option>Coral</option>
									<option>Ministro de Eucaristia</option>
									<option>Proclamadores</option>
									</select>
								</div>

								<div class="form-row mx-3">
								<div class="col-md-8 mx-2">
								<label for="validationTooltip01 mx-2">Regulamento</label>
								</div>
				                <div class="col-md-12 mb-3 mx-2">
								    <input type="file" class="custom-file-input" value="<?php echo $d->current()->regulamento_grupo;?>" name="arquivo_regulamento" id="validatedCustomFile" required>
								    <label class="custom-file-label" for="validatedCustomFile"></label>
								    <div class="invalid-feedback">Ficheiro Invalido</div>
							    </div>
							    </div>

							    <div class="form-row">
								<div class="col-md-8 mx-2">
									<label for="validationTooltip01 mx-2">Imagem</label>
								</div>
				                <div class="col-md-12 mb-3 mx-2">
								    <input type="file" class="custom-file-input" value="<?=$d->current()->imagem_grupo?>" name="arquivo" id="validatedCustomFile" required>
								    <label class="custom-file-label" for="validatedCustomFile"></label>
								    <div class="invalid-feedback">Ficheiro Invalido</div>
							    </div>
							    </div>
				    		</div>
							<hr>
							<button type="submit" name="btActualizar" id="btActualizar" class="btn btn-primary mx-3 mb-4" value="actualizar">Actualizar</button>
							<button type="submit" id="btCancelar" class="btn btn-danger mx-3 mb-4">Cancelar</button>
						</div>
					</fieldset>
				</form>
				<?php
					$d->next();
				}?>
			</div>
		</div>

		<!-- Footer -->
	      <?php
	        include_once 'rodape.php';
	      ?>
	</div>

