
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$data_proclamacao = $_POST['data_proclamacao'];
		$tempo_liturgico_proclamacao = $_POST['tempo_liturgico_proclamacao'];
		$dia_proclamacao = $_POST['dia_proclamacao'];
		$hora_proclamacao = $_POST['hora_proclamacao'];
		$proclamador_primeira_leitura = $_POST['proclamador_primeira_leitura'];
		$proclamador_salmo_responsorial = $_POST['proclamador_salmo_responsorial'];
		$proclamador_segunda_leitura = $_POST['proclamador_segunda_leitura'];
		$proclamador_preces = $_POST['proclamador_preces'];
		$monitor = $_POST['monitor'];
		if(cadastrarPDOescalaProclamadores($data_proclamacao, $tempo_liturgico_proclamacao, $dia_proclamacao, $hora_proclamacao, $proclamador_primeira_leitura, $proclamador_salmo_responsorial, $proclamador_segunda_leitura, $proclamador_preces, $monitor)){
			echo "Escala cadastrada com sucesso...";
			echo "<script>alert('Escala cadastrada com sucesso');window.location.href='listar_escala_proclamadores.php';</script>";
		}else{
			echo "Erro ao cadastrar a Escala...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="listar_escala_proclamadores.php" class="btn btn-primary">Listar Escala</a> 
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
					      			<input type="date" class="form-control" name="data_proclamacao" id="data_proclamacao" placeholder="Data de Proclamação">
					    		</div>
 
					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOtempoLiturgico(); 
									$dg = new ArrayIterator($dadosg);?>
					      			<select type="number" id="tempo_liturgico_proclamacao" name="tempo_liturgico_proclamacao" class="form-control" required> 
										<option value="<?php echo $dg->current()->id_tempo_liturgico;?>">Tempo Liturgico</option>
										<?php while($dg->valid()){?>
										<option value="<?php echo $dg->current()->id_tempo_liturgico; ?>"><?php echo $dg->current()->descrisao_nome_tempo. " - " .$dg->current()->descrisao_ano_tempo."<br/>"; ?><?php $dg->next(); }?> </option>
									</select>
								</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mb-3">
		                            <select type="text" id="dia_proclamacao" name="dia_proclamacao" class="form-control" required>
		                            <option selected>Dia de Proclamação</option>
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
					    			Hora da Proclamação
					      			<input type="time" class="form-control" name="hora_proclamacao" id="hora_proclamacao" placeholder="Hora da Animação">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOmembroProclamador(); 
									$dProclamador = new ArrayIterator($dadosg);?>
					      			<select type="number" id="proclamador_primeira_leitura" name="proclamador_primeira_leitura" class="form-control" required> 
										<option value="<?php echo $dProclamador->current()->id_membro;?>">Proclamador da 1ª Leitura</option>
										<?php while($dProclamador->valid()){?>
										<option value="<?php echo $dProclamador->current()->id_membro; ?>"><?php echo $dProclamador->current()->nome_membro ."<br/>"; ?><?php $dProclamador->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOmembroProclamador(); 
									$dProclamador = new ArrayIterator($dadosg);?>
					      			<select type="number" id="proclamador_salmo_responsorial" name="proclamador_salmo_responsorial" class="form-control" required> 
										<option value="<?php echo $dProclamador->current()->id_membro;?>">Proclamador do Salmo Responsorial</option>
										<?php while($dProclamador->valid()){?>
										<option value="<?php echo $dProclamador->current()->id_membro; ?>"><?php echo $dProclamador->current()->nome_membro ."<br/>"; ?><?php $dProclamador->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOmembroProclamador(); 
									$dProclamador = new ArrayIterator($dadosg);?>
					      			<select type="number" id="proclamador_segunda_leitura" name="proclamador_segunda_leitura" class="form-control" required> 
										<option value="<?php echo $dProclamador->current()->id_membro;?>">Proclamador da 2ª Leitura</option>
										<?php while($dProclamador->valid()){?>
										<option value="<?php echo $dProclamador->current()->id_membro; ?>"><?php echo $dProclamador->current()->nome_membro ."<br/>"; ?><?php $dProclamador->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOmembroProclamador(); 
									$dProclamador = new ArrayIterator($dadosg);?>
					      			<select type="number" id="proclamador_preces" name="proclamador_preces" class="form-control" required> 
										<option value="<?php echo $dProclamador->current()->id_membro;?>">Proclamador da Oração dos Fieis</option>
										<?php while($dProclamador->valid()){?>
										<option value="<?php echo $dProclamador->current()->id_membro; ?>"><?php echo $dProclamador->current()->nome_membro ."<br/>"; ?><?php $dProclamador->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOmembroProclamador(); 
									$dProclamador = new ArrayIterator($dadosg);?>
					      			<select type="number" id="monitor" name="monitor" class="form-control" required> 
										<option value="<?php echo $dProclamador->current()->id_membro;?>">Monitor</option>
										<?php while($dProclamador->valid()){?>
										<option value="<?php echo $dProclamador->current()->id_membro; ?>"><?php echo $dProclamador->current()->nome_membro ."<br/>"; ?><?php $dProclamador->next(); }?> </option>
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

