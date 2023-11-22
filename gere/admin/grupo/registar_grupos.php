
<?php
    include_once 'menu.php';
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
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$nome_grupo = $_POST['nome_grupo'];
		$carisma_grupo = $_POST['carisma_grupo'];
		$fundacao_grupo = $_POST['fundacao_grupo'];
		$padroeiro_grupo = $_POST['padroeiro_grupo'];
		$id_tipo_grupo = $_POST['id_tipo_grupo'];
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

		if(cadastrarPDOgrupo($nome_grupo, $carisma_grupo, $imagem_grupo, $regulamento_grupo, $fundacao_grupo, $padroeiro_grupo, $id_tipo_grupo, 0, $id_comissao)){
			echo "Grupo cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_grupos.php';</script>";
		}else{
			echo "Erro ao cadastrar o Grupo...";
		}
	}

		
	 ?>


	<!-- Formulario de registro de Medicamento -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Grupo</legend>
				  		<div class="form-row">
				    		<div class="col-md-4 mb-3">
				      			<input type="text" class="form-control" name="nome_grupo" id="nome_grupo" placeholder="Nome do Grupo" required>
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
				  				<input type="text" class="form-control" name="carisma_grupo" id="carisma_grupo" placeholder="Carisma do Grupo" required>
							</div>
							
							</div>
							<div class="form-row">
							<div class="col-md-4 mb-3">
				  				<input type="date" class="form-control" name="fundacao_grupo" id="fundacao_grupo" placeholder="Data de Fundação" required>
							</div>
							<div class="col-md-4 mb-3">
				      			<input type="text" class="form-control" name="padroeiro_grupo" id="padroeiro_grupo" placeholder="Padroeiro(a) do Grupo" required>
				    		</div>

				    		<div class="form-group mx-3">
				  				<?php 
								$dadosg = listarPDOtipogrupo(); 
								$dg = new ArrayIterator($dadosg);?>
				      			<select type="number" id="id_tipo_grupo" name="id_tipo_grupo" class="form-control" required> 
									<option value="<?php echo $dg->current()->id_tipo_grupo;?>">Tipo de Grupo</option>
									<?php while($dg->valid()){?>
									<option value="<?php echo $dg->current()->id_tipo_grupo; ?>"><?php echo $dg->current()->nome_tipo_grupo. "<br/>"; ?><?php $dg->next(); }?> </option>
								</select>
							</div>

							<div class="form-row mx-3">
							<div class="col-md-8 mx-2">
							<label for="validationTooltip01 mx-2">Regulamento</label>
							</div>
			                <div class="col-md-12 mb-3 mx-2">
							    <input type="file" class="custom-file-input" name="arquivo_regulamento" id="validatedCustomFile" required>
							    <label class="custom-file-label" for="validatedCustomFile"></label>
							    <div class="invalid-feedback">Ficheiro Invalido</div>
						    </div>
						    </div>

						    <div class="form-row">
							<div class="col-md-8 mx-2">
								<label for="validationTooltip01 mx-2">Imagem</label>
							</div>
			                <div class="col-md-12 mb-3 mx-2">
							    <input type="file" class="custom-file-input" name="arquivo" id="validatedCustomFile" required>
							    <label class="custom-file-label" for="validatedCustomFile"></label>
							    <div class="invalid-feedback">Ficheiro Invalido</div>
						    </div>
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

	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>

