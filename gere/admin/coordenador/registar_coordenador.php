
<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$grupo_coordenador_id = $_POST['grupo_coordenador_id'];
		$cargo_coordenador = $_POST['cargo_coordenador'];
		$descricao_cargo_coordenador = $_POST['descricao_cargo_coordenador'];
		$membro_coordenador_id = $_POST['membro_coordenador_id'];
		$data_inicio_coordenador = $_POST['data_inicio_coordenador'];
		$data_fim_coordenador = $_POST['data_fim_coordenador'];

		
		if(cadastrarPDOcoordenador($grupo_coordenador_id, $cargo_coordenador, $descricao_cargo_coordenador, $membro_coordenador_id, $data_inicio_coordenador, $data_fim_coordenador)){
			echo "Coordenador cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_coordenador.php';</script>";
		}else{
			echo "Erro ao cadastrar o Coordenador...";
		}
	}
	 ?>


	<!-- Formulario de registro de Medicamento -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Coordenador</legend>
				  		<div class="form-row">

				  			<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Membro</label>
				  				<?php 
								$dadosm = listarPDOmembro(); 
								$dm = new ArrayIterator($dadosm);?>
				      			<select type="number" id="membro_coordenador_id" name="membro_coordenador_id" class="form-control" required> 
									<option value="<?php echo $dm->current()->id_grupo;?>">Membro</option>
									<?php while($dm->valid()){?>
									<option value="<?php echo $dm->current()->id_membro; ?>"><?php echo $dm->current()->nome_membro. "<br/>"; ?><?php $dm->next(); }?> </option>
								</select>
							</div>

				    		<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Grupo</label>
				  				<?php 
								$dadosg = listarPDOgrupo(); 
								$dg = new ArrayIterator($dadosg);?>
				      			<select type="number" id="grupo_coordenador_id" name="grupo_coordenador_id" class="form-control" required> 
									<option value="<?php echo $dg->current()->id_grupo;?>">Grupo</option>
									<?php while($dg->valid()){?>
									<option value="<?php echo $dg->current()->id_grupo; ?>"><?php echo $dg->current()->nome_grupo. "<br/>"; ?><?php $dg->next(); }?> </option>
								</select>
							</div>


							<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Cargo</label>
								<select type="text" id="cargo_coordenador" name="cargo_coordenador" class="form-control">
								<option selected>Cargo</option>
								<option>Coordenador(a)</option>
								<option>Vice-Coordenador(a)</option>
								<option>Secretario(a)</option>
								<option>Tesoureiro(a)</option>
								<option>Coord. Disciplina</option>
								<option>Assistente Espiritual</option>
								</select>
							</div>

							<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Data de Inicio</label>
				  				<input type="date" class="form-control" name="data_inicio_coordenador" id="data_inicio_coordenador" placeholder="Data de Inicio">
							</div>

							<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Data de Fim</label>
				  				<input type="date" class="form-control" name="data_fim_coordenador" id="data_fim_coordenador" placeholder="Data de Fim">
							</div>
							</div>
							<div class="form-row">
							 <div class="col-md-8 mx-2">
							    <label for="exampleFormControlTextarea1">Descrisão do Cargo</label>
							    <textarea class="form-control" id="descricao_cargo_coordenador" name="descricao_cargo_coordenador"rows="3"></textarea>
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

