
	<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$data_leitura = $_POST['data_leitura'];
		$tempo_liturgico = $_POST['tempo_liturgico'];
		$titulo_primeira_leitura = $_POST['titulo_primeira_leitura'];
		$primeira_leitura = $_POST['primeira_leitura'];
		$titulo_segunda_leitura = $_POST['titulo_segunda_leitura'];
		$segunda_leitura = $_POST['segunda_leitura'];
		$titulo_salmo = $_POST['titulo_salmo'];
		$salmo_responsorial = $_POST['salmo_responsorial'];
		$titulo_preces = $_POST['titulo_preces'];
		$oracao_dos_fieis = $_POST['oracao_dos_fieis'];
		$titulo_evangelho = $_POST['titulo_evangelho'];
		$evangelho = $_POST['evangelho'];

		if(cadastrarPDOleituras($data_leitura, $tempo_liturgico ,$titulo_primeira_leitura, $primeira_leitura, $titulo_segunda_leitura, $segunda_leitura, $titulo_salmo, $salmo_responsorial, $titulo_preces, $oracao_dos_fieis, $titulo_evangelho, $evangelho)){
			echo "Leituras cadastradas com sucesso...";
			echo "<script>alert('Leituras cadastradas com sucesso');window.location.href='leituras.php';</script>";
		}else{
			echo "Erro ao cadastrar as Leituras...";
		}
	}
 	?>

	<!-- Formulario de registro de Tipo de Grupo -->
	<div class="container">
		<div class="row my-2">
	        <div class="col d-flex flex-column align-items-center text-center">
	          <a href="listar_leituras.php" class="btn btn-primary">Listar Leituras</a> 
	        </div>
	    </div>

	    <hr>
		<div class="row mx-3">
			<div class="mycontent-left">
				<form method="POST" enctype="multipart/form-data">
					<fieldset>
						<div class="fieldset mx-2">
							<legend class="legend mx-2 mb-2">Publique aqui as Leituras</legend>
					  		<div class="form-row">
					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="date" class="form-control" name="data_leitura" id="data_leitura" placeholder="Data das Leituras">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3 form-group mx-3 my-3">
					  				<?php 
									$dadosg = listarPDOtempoLiturgico(); 
									$dg = new ArrayIterator($dadosg);?>
					      			<select type="number" id="tempo_liturgico" name="tempo_liturgico" class="form-control" required> 
										<option value="<?php echo $dg->current()->id_tempo_liturgico;?>">Tempo Liturgico</option>
										<?php while($dg->valid()){?>
										<option value="<?php echo $dg->current()->id_tempo_liturgico; ?>"><?php echo $dg->current()->descrisao_tempo_liturgico. " " .$dg->current()->descrisao_nome_tempo. " - " .$dg->current()->descrisao_ano_tempo."<br/>"; ?><?php $dg->next(); }?> </option>
									</select>
								</div>

								<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_primeira_leitura" id="titulo_primeira_leitura" placeholder="Titulo da Primeira Leitura">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<textarea type="text" class="form-control" name="primeira_leitura" id="primeira_leitura" placeholder="Primeira Leitura"></textarea>
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_salmo" id="titulo_salmo" placeholder="Titulo do Salmo">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<textarea type="text" class="form-control" name="salmo_responsorial" id="salmo_responsorial" placeholder="Salmo Responsorial"></textarea>
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_segunda_leitura" id="titulo_segunda_leitura" placeholder="Titulo da Segunda Leitura">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<textarea type="text" class="form-control" name="segunda_leitura" id="segunda_leitura" placeholder="Segunda Leitura"></textarea>
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_preces" id="titulo_preces" placeholder="Titulo da Oração dos Fieis">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<textarea type="text" class="form-control" name="oracao_dos_fieis" id="oracao_dos_fieis" placeholder="Oração dos Fieis"></textarea>
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<input type="text" class="form-control" name="titulo_evangelho" id="titulo_evangelho" placeholder="Titulo Evangelho">
					    		</div>

					    		<div class="col-md-6 mx-3 my-3">
					      			<textarea type="text" class="form-control" name="evangelho" id="evangelho" placeholder="Evangelho"></textarea>
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

