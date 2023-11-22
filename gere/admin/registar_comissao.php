
<?php
    include_once 'menu.php';
    ?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_comissoes.php" class="btn btn-primary">Listar Comissões</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_comissoes_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<!-- registro de Comissão na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$nome_comissao = $_POST['nome_comissao'];
		$detalhes_comissao = $_POST['detalhes_comissao'];

		if (isset($_FILES['arquivo_regulamento'])) {
			$arquivo_regulamento = $_FILES['arquivo_regulamento']['name'];
			$extensao_r = strtolower(pathinfo($arquivo_regulamento, PATHINFO_EXTENSION));
			$regulamento_comissao =$nome_comissao.".".$extensao_r;
			$diretorior = "Regulamento_comissao/";
			if(!is_dir($diretorior))
				mkdir($diretorior);
			move_uploaded_file($_FILES['arquivo_regulamento']['tmp_name'], $diretorior . $regulamento_comissao);
		}


		if(isset($_FILES['arquivo'])){
		    $arquivo = $_FILES['arquivo']['name'];
		    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
		    $imagem_comissao = $nome_comissao.".".$extensao;
		    $diretorio = "Imagem_comissao/";
		    if(!is_dir($diretorio))
				mkdir($diretorio);
		    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $imagem_comissao);
		}

		if(cadastrarPDOcomissao($nome_comissao, $detalhes_comissao, $regulamento_comissao, $imagem_comissao)){
			echo "Comissão cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_comissao.php';</script>";
		}else{
			echo "Erro ao cadastrar o Comissão...";
		}
	}

		
	 ?>


	<!-- Formulario de registro de Comissão -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados da Comissão</legend>
				  			<div class="form-row">
					    		<div class="col-md-4 mb-3">
					      			<input type="text" class="form-control" name="nome_comissao" id="nome_comissao" placeholder="Nome da Comissão" required>
					    		</div>
								
								<div class="col-md-4 mb-3">
					  				<input type="text" class="form-control" name="detalhes_comissao" id="detalhes_comissao" placeholder="Detalhes" required>
								</div>

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

