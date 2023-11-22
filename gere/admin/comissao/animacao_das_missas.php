
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$data_escala_animacao = $_POST['data_escala_animacao'];
		$dia_escala_animacao = $_POST['dia_escala_animacao'];
		$hora_escala_animacao = $_POST['hora_escala_animacao'];
		$escala_tempo_liturgico = $_POST['escala_tempo_liturgico'];
		$grupo_coral_animador = $_POST['grupo_coral_animador'];
		if(cadastrarPDOescalaAnimacao($data_escala_animacao, $dia_escala_animacao ,$hora_escala_animacao, $escala_tempo_liturgico, $grupo_coral_animador)){
			echo "Escala cadastrada com sucesso...";
			echo "<script>alert('Escala cadastrada com sucesso');window.location.href='listar_escala_animacao.php';</script>";
		}else{
			echo "Erro ao cadastrar a Escala...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="listar_escala_animacao.php" class="btn btn-primary">Listar Escala</a> 
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
					      			<input type="date" class="form-control" name="data_escala_animacao" id="data_escala_animacao" placeholder="Data da Animação">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOtempoLiturgico(); 
									$dg = new ArrayIterator($dadosg);?>
					      			<select type="number" id="escala_tempo_liturgico" name="escala_tempo_liturgico" class="form-control" required> 
										<option value="<?php echo $dg->current()->id_tempo_liturgico;?>">Tempo Liturgico</option>
										<?php while($dg->valid()){?>
										<option value="<?php echo $dg->current()->id_tempo_liturgico; ?>"><?php echo $dg->current()->descrisao_nome_tempo. " - " .$dg->current()->descrisao_ano_tempo."<br/>"; ?><?php $dg->next(); }?> </option>
									</select>
								</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mb-3">
			                            <select type="text" id="dia_escala_animacao" name="dia_escala_animacao" class="form-control" required>
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
					    			Hora da Animação
					      			<input type="time" class="form-control" name="hora_escala_animacao" id="hora_escala_animacao" placeholder="Hora da Animação">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOgrupoCoral(); 
									$dcoral = new ArrayIterator($dadosg);?>
					      			<select type="number" id="grupo_coral_animador" name="grupo_coral_animador" class="form-control" required> 
										<option value="<?php echo $dcoral->current()->id_grupo;?>">Grupo Coral</option>
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

