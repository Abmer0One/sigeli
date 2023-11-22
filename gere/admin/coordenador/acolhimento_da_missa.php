
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$data_acolhimento = $_POST['data_acolhimento'];
		$hora_acolhimento = $_POST['hora_acolhimento'];
		$dia_acolhimento = $_POST['dia_acolhimento'];
		$tempo_liturgico_acolhimento = $_POST['tempo_liturgico_acolhimento'];
		$grupo_acolhimento = $_POST['grupo_acolhimento'];
		if(cadastrarPDOescalaAcolhimento($data_acolhimento, $hora_acolhimento ,$dia_acolhimento, $tempo_liturgico_acolhimento, $grupo_acolhimento)){
			echo "Escala cadastrada com sucesso...";
			echo "<script>alert('Escala cadastrada com sucesso');window.location.href='listar_escala_acolhimento.php';</script>";
		}else{
			echo "Erro ao cadastrar a Escala...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="listar_escala_acolhimento.php" class="btn btn-primary">Listar Escala</a> 
	        </div>
	    </div>

	    <hr>
		<div class="row mx-3">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Regista a Escala do dia</legend>
					  		<div class="form-row">
					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="date" class="form-control" name="data_acolhimento" id="data_acolhimento" placeholder="Data de Acolhimento">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOtempoLiturgico(); 
									$dg = new ArrayIterator($dadosg);?>
					      			<select type="number" id="tempo_liturgico_acolhimento" name="tempo_liturgico_acolhimento" class="form-control" required> 
										<option value="<?php echo $dg->current()->id_tempo_liturgico;?>">Tempo Liturgico</option>
										<?php while($dg->valid()){?>
										<option value="<?php echo $dg->current()->id_tempo_liturgico; ?>"><?php echo $dg->current()->descrisao_nome_tempo. " - " .$dg->current()->descrisao_ano_tempo."<br/>"; ?><?php $dg->next(); }?> </option>
									</select>
								</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mb-3">
			                            <select type="text" id="dia_acolhimento" name="dia_acolhimento" class="form-control" required>
			                            <option selected>Dia de Animação</option>
			                            <option>Segunda</option>
			                            <option>Terça</option>
			                            <option>Quarta</option>
			                            <option>Quinta</option>
			                            <option>Sexta</option>
			                            <option>Sabado</option>
			                            <option>Domingo</option>
			                            </select>
			                        </div>

					    		<div class="col-md-6 mx-3 my-3">
					    			Hora de Acolhimento
					      			<input type="time" class="form-control" name="hora_acolhimento" id="hora_acolhimento" placeholder="Hora de Acolhimento">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOgrupoAcolhimento(); 
									$dcoral = new ArrayIterator($dadosg);?>
					      			<select type="number" id="grupo_acolhimento" name="grupo_acolhimento" class="form-control" required> 
										<option value="<?php echo $dcoral->current()->id_grupo;?>">Grupo de Acolhimento</option>
										<?php while($dcoral->valid()){?>
										<option value="<?php echo $dcoral->current()->id_grupo; ?>"><?php echo $dcoral->current()->nome_grupo ."<br/>"; ?><?php $dcoral->next(); }?> </option>
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
		

		<!-- Footer -->
      	<?php
       	 include_once 'rodape.php';
      	?>
	</div>

