
<?php
    include_once 'menu.php';
    ?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_usuarios.php" class="btn btn-primary">Listar Usuarios</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_usuarios_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		$sobrenome = $_POST['sobrenome'];
		$username = $_POST['username'];
		$estado = "activo";
		$nivel = $_POST['nivel'];
		$tipo_nivel = $_POST['id_grupo'];

		
		
		if(isset($_FILES['arquivo'])){
		    $arquivo = $_FILES['arquivo']['name'];
		    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
		    $foto = $nome.".".$extensao;
		    $diretorio = "Imagem_usuario/";
		    
		    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $foto);
		}

		if(cadastrarPDOusuario($nome, $sobrenome, $username, $senha, $nivel, $tipo_nivel, $estado, $foto)){
			echo "Usuario cadastrado com sucesso...";
			echo "<script>alert('Registo feito com sucesso');window.location.href='registar_usuario.php';</script>";
		}else{
			echo "Erro ao cadastrar o Usuario...";
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
						<legend class="legend mx-2 mb-2">Inserir os Dados do Usuario</legend>
				  		<div class="form-row">
				    		<div class="col-md-4 mb-3">
				      			<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Usuario" required>
				    		</div>

								<div class="col-md-4 mb-3">
					  				<input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome do Usuario" required>
								</div>

								<div class="col-md-4 mb-3">
					  				<input type="text" class="form-control" name="senha" id="senha" placeholder="Senha do Usuario" required>
								</div>
							
							</div>
							<div class="form-row">
									<div class="col-md-4 mb-3">
					  				<input type="text" class="form-control" name="username" id="username" placeholder="Usuario" required>
									</div>
									<div class="col-md-4 mb-3">
					      			<input type="text" class="form-control" name="nivel" id="nivel" placeholder="Nivel do Usuario" required>
					    		</div>

						    		<div class="form-group mx-3">
					  				<?php 
											$dadosg = listarPDOgrupo(); 
											$dg = new ArrayIterator($dadosg);?>
					      			<select type="number" id="id_grupo" name="id_grupo" class="form-control" required> 
												<option value="<?php echo $dg->current()->id_grupo;?>">Grupo</option>
												<?php while($dg->valid()){?>
												<option value="<?php echo $dg->current()->id_grupo; ?>"><?php echo $dg->current()->nome_grupo. "<br/>"; ?><?php $dg->next(); }?> </option>
											</select>
										</div>

									


						    <div class="form-row">
							<div class="col-md-8 mx-2">
								<label for="validationTooltip01 mx-2">Foto do Usuario</label>
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

