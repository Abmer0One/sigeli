
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$data_actividade = $_POST['data_actividade'];
		$hora_actividade = $_POST['hora_actividade'];
		$tipo_de_actividade = $_POST['tipo_de_actividade'];
		$objectivo_actividade = $_POST['objectivo_actividade'];
		$local_actividade = $_POST['local_actividade'];
		$responsavel_actividade = $_POST['responsavel_actividade'];
		$participantes_actividade = $_POST['participantes_actividade'];

		if(cadastrarPDOactividade($data_actividade, $hora_actividade, $tipo_de_actividade, $objectivo_actividade, $local_actividade, $responsavel_actividade, $participantes_actividade)){
			echo "Actividade cadastradas com sucesso...";
			echo "<script>alert('Actividade cadastrada com sucesso');window.location.href='actividades.php';</script>";
		}else{
			echo "Erro ao cadastrar a Actividade...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="actividades.php" class="btn btn-primary">Listar Actividades</a> 
	        </div>
	    </div>

	    <hr>
		<div class="row mx-3">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Registe aqui a Actividade</legend>
					  		<div class="form-row">
					    		<div class="col-md-6 mx-3 my-3">
					    			Data da Actividade
					      			<input type="date" class="form-control" name="data_actividade" id="data_actividade" placeholder="Data da Actividade">
					    		</div>


								<div class="col-md-6 mx-3 my-3">
									Hora da Actividade
					      			<input type="time" class="form-control" name="hora_actividade" id="hora_actividade" placeholder="Hora da Actividade">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input  type="text" class="form-control" name="tipo_de_actividade" id="tipo_de_actividade" placeholder="Tipo de Actividade">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="objectivo_actividade" id="objectivo_actividade" placeholder="Objectivo da Actividade">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="local_actividade" id="local_actividade" placeholder="Local da Actividade">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="responsavel_actividade" id="responsavel_actividade" placeholder="Responsável pela Actividade">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="participantes_actividade" id="participantes_actividade" placeholder="Participantes da Actividade">
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

