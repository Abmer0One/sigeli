
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Informação Semanal na Base de dados com php -->
	
	<?php 
	if(isset($_POST['btRegistar'])){
		$titulo_info_papa = $_POST['titulo_info_papa'];
		$informacao_papa = $_POST['informacao_papa'];
		$titulo_info_liturgia = $_POST['titulo_info_liturgia'];
		$informacao_liturgia = $_POST['informacao_liturgia'];
		$titulo_info_outro = $_POST['titulo_info_outro'];
		$informacao_outro = $_POST['informacao_outro'];

		if(cadastrarPDOInformacaoSemanal($titulo_info_papa, $informacao_papa, $titulo_info_liturgia, $informacao_liturgia, $titulo_info_outro, $informacao_outro)){
			echo "Informação cadastrada com sucesso...";
			echo "<script>alert('Informação cadastrada com sucesso');window.location.href='informacao_semanal.php';</script>";
		}else{
			echo "Erro ao cadastrar a Informação...";
		}
	}
 	?>

	<!-- Formulario de registro de Informação Semanal -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="informacao_semanal.php" class="btn btn-primary">Listar Informações Semanais</a> 
	        </div>
	    </div>

	    <hr>
		<div class="row mx-3">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Registe aqui a Informação Semanal</legend>
							
					  		<div class="form-row">

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_info_papa" id="titulo_info_papa" placeholder="Titulo">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="informacao_papa" id="informacao_papa" placeholder="Conteúdo sobre o Papa">
					    		</div>


					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_info_liturgia" id="titulo_info_liturgia" placeholder="Titulo">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="informacao_liturgia" id="informacao_liturgia" placeholder="Conteúdo sobre a Liturgia">
					    		</div>


					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_info_outro" id="titulo_info_outro" placeholder="Titulo">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="informacao_outro" id="informacao_outro" placeholder="Conteúdo sobre outras Informações">
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

