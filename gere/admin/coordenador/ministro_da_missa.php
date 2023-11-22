
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$data_ministragem = $_POST['data_ministragem'];
		$dia_ministragem = $_POST['dia_ministragem'];
		$hora_ministragem = $_POST['hora_ministragem'];
		$tempo_liturgico_ministragem = $_POST['tempo_liturgico_ministragem'];
		$nome_ministro_eucaristia = $_POST['nome_ministro_eucaristia'];
		if(cadastrarPDOescalaMinistro($data_ministragem, $dia_ministragem, $hora_ministragem, $tempo_liturgico_ministragem, $nome_ministro_eucaristia)){
			echo "Escala cadastrada com sucesso...";
			echo "<script>alert('Escala cadastrada com sucesso');window.location.href='listar_escala_ministros.php';</script>";
		}else{
			echo "Erro ao cadastrar a Escala...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="listar_escala_ministros.php" class="btn btn-primary">Listar Escala</a> 
	        </div>
	    </div>

	    <hr>
		<div class="row mx-3">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Regista o Ministro do dia</legend>
					  		<div class="form-row">
					    		<div class="col-md-6 mx-3 my-3">
					    			Data da Celebração
					      			<input type="date" class="form-control" name="data_ministragem" id="data_ministragem" placeholder="Data de Ministragem">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOtempoLiturgico(); 
									$dg = new ArrayIterator($dadosg);?>
					      			<select type="number" id="tempo_liturgico_ministragem" name="tempo_liturgico_ministragem" class="form-control" required> 
										<option value="<?php echo $dg->current()->id_tempo_liturgico;?>">Tempo Liturgico</option>
										<?php while($dg->valid()){?>
										<option value="<?php echo $dg->current()->id_tempo_liturgico; ?>"><?php echo $dg->current()->descrisao_nome_tempo. " - " .$dg->current()->descrisao_ano_tempo."<br/>"; ?><?php $dg->next(); }?> </option>
									</select>
								</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mb-3">
			                            <select type="text" id="dia_ministragem" name="dia_ministragem" class="form-control" required>
			                            <option selected>Dia de Ministragem</option>
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
					    			Hora de Ministragem
					      			<input type="time" class="form-control" name="hora_ministragem" id="hora_ministragem" placeholder="Hora da Animação">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="nome_ministro_eucaristia" id="nome_ministro_eucaristia" placeholder="Nome do Ministro">
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

