
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$tipo_missa = $_POST['tipo_missa'];
		$data_missa = $_POST['data_missa'];
		$padre_missa = $_POST['padre_missa'];
		$dia_missa = $_POST['dia_missa'];
		$hora_missa = $_POST['hora_missa'];
		$acolitos_missa = $_POST['acolitos_missa'];
		$leitores_missa = $_POST['leitores_missa'];
		$coral_missa = $_POST['coral_missa'];
		$acolhimento_missa = $_POST['acolhimento_missa'];
		$ministros_missa = $_POST['ministros_missa'];
		$leituras_missa = $_POST['leituras_missa'];

		if(cadastrarPDOmissa($tipo_missa, $data_missa, $padre_missa, $dia_missa, $hora_missa, $acolitos_missa, $leitores_missa, $coral_missa, $acolhimento_missa, $ministros_missa, $leituras_missa)){
			echo "Missa cadastrada com sucesso...";
			echo "<script>alert('Missa cadastrada com sucesso');window.location.href='missas.php';</script>";
		}else{
			echo "Erro ao cadastrar a Missa...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="missas.php" class="btn btn-primary">Listar Missas</a> 
	        </div>
	    </div>

	    <hr>
		<div class="row mx-3">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Registe aqui a Missa</legend>
					  		<div class="form-row">
					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="date" class="form-control" name="data_missa" id="data_missa" placeholder="Data da Missa">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mb-3">
		                            <select type="text" id="dia_missa" name="dia_missa" class="form-control" required>
		                            <option selected>Dia de Missa</option>
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
					      			<input  type="time" class="form-control" name="hora_missa" id="hora_missa" placeholder="Hora da Missa">
					    		</div>

					    		
					    		<div class="col-md-6 mx-3 my-3 form-group mb-3">
		                            <select type="text" id="tipo_missa" name="tipo_missa" class="form-control" required>
		                            <option selected>Tipo de Missa</option>
		                            <option>Solene</option>
		                            <option>Ferial</option>
		                            <option>Normal</option>
		                            </select>
		                        </div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosPadre = listarPDOescalaPadres(); 
									$dPadre = new ArrayIterator($dadosPadre);?>
					      			<select type="number" id="padre_missa" name="padre_missa" class="form-control" required> 
										<option value="<?php echo $dPadre->current()->id_escala_padre;?>">Padre da Missa</option>
										<?php while($dPadre->valid()){?>
										<option value="<?php echo $dPadre->current()->id_escala_padre; ?>"><?php echo $dPadre->current()->nome_padre_celebracao ."<br/>"; ?><?php $dPadre->next(); }?> </option>
									</select>
								</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="number" class="form-control" name="acolitos_missa" id="acolitos_missa" placeholder="Acólitos da Missa">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosProclamadores = listarPDOescalaProclamadores(); 
									$dProclamadores = new ArrayIterator($dadosProclamadores);?>
					      			<select type="number" id="leitores_missa" name="leitores_missa" class="form-control" required> 
										<option value="<?php echo $dProclamadores->current()->id_escala_proclamador;?>">Proclamadores da Missa</option>
										<?php while($dProclamadores->valid()){?>
										<option value="<?php echo $dProclamadores->current()->id_escala_proclamador; ?>"><?php echo $dProclamadores->current()->data_proclamacao."<br/>"; ?><?php $dProclamadores->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosMinistro = listarPDOescalaMinistro(); 
									$dMinistros = new ArrayIterator($dadosMinistro);?>
					      			<select type="number" id="ministros_missa" name="ministros_missa" class="form-control" required> 
										<option value="<?php echo $dMinistros->current()->id_escala_ministro;?>">Ministros da Missa</option>
										<?php while($dMinistros->valid()){?>
										<option value="<?php echo $dMinistros->current()->id_escala_ministro; ?>"><?php echo $dMinistros->current()->nome_ministro_eucaristia."<br/>"; ?><?php $dMinistros->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosAnimacao = listarPDOescalaAnimacao(); 
									$dCoral = new ArrayIterator($dadosAnimacao);?>
					      			<select type="number" id="coral_missa" name="coral_missa" class="form-control" required> 
										<option value="<?php echo $dCoral->current()->id_escala_animacao;?>">Coral da Missa</option>
										<?php while($dCoral->valid()){?>
										<option value="<?php echo $dCoral->current()->id_escala_animacao; ?>"><?php echo $dCoral->current()->data_escala_animacao."<br/>"; ?><?php $dCoral->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosAcolhimento = listarPDOescalaAcolhimento(); 
									$dAcolhimento = new ArrayIterator($dadosAcolhimento);?>
					      			<select type="number" id="acolhimento_missa" name="acolhimento_missa" class="form-control" required> 
										<option value="<?php echo $dAcolhimento->current()->id_escala_acolhimento;?>">Acolhimento da Missa</option>
										<?php while($dAcolhimento->valid()){?>
										<option value="<?php echo $dAcolhimento->current()->id_escala_acolhimento; ?>"><?php echo $dAcolhimento->current()->data_acolhimento."<br/>"; ?><?php $dAcolhimento->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosLeituras = listarPDOleituras(); 
									$dLeituras = new ArrayIterator($dadosLeituras);?>
					      			<select type="number" id="leituras_missa" name="leituras_missa" class="form-control" required> 
										<option value="<?php echo $dLeituras->current()->id_leituras;?>">Leituras da Missa</option>
										<?php while($dLeituras->valid()){?>
										<option value="<?php echo $dLeituras->current()->id_leituras; ?>"><?php echo $dLeituras->current()->data_leitura."<br/>"; ?><?php $dLeituras->next(); }?> </option>
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

