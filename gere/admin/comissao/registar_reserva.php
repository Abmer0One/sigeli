
<?php
  include_once 'menu.php';
?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_reserva.php" class="btn btn-primary">Listar Reserva</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_reserva_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>

	<!-- registro de Emprestimo na Base de dados com php --> 
	<?php 
		if(isset($_POST['btRegistar'])){
			$material_reserva = $_POST['material_reserva'];
			$reservador = $_POST['reservador'];
			$tipo_de_actividade = $_POST['tipo_de_actividade'];
			$data_reserva = $_POST['data_reserva'];
			$hora_reserva = $_POST['hora_reserva'];

			if(cadastrarPDOreserva($material_reserva, $reservador, $tipo_de_actividade, $data_reserva, $hora_reserva)){
				echo "Reserva cadastrado com sucesso...";
				echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_reserva.php';</script>";
			}else{
				echo "Erro ao cadastrar o Reserva...";
			}
		}
 	?>


	<!-- Formulario de registro de Reserva -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados da Reserva</legend>
				  			<div class="form-row">

					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="material_reserva" id="material_reserva" placeholder="Material" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="text" class="form-control" name="reservador" id="reservador" placeholder="Reservador" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="tipo_de_actividade" id="tipo_de_actividade" placeholder="Tipo de Actividade" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="date" class="form-control" name="data_reserva" id="data_reserva" placeholder="Data de Reserva" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="time" class="form-control" name="hora_reserva" id="hora_reserva" placeholder="Hora de Reserva" required>
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

