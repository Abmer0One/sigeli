
<?php
    include_once 'menu.php';
    ?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_doadores.php" class="btn btn-primary">Listar Doadores</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_doadores_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<!-- registro de Doadores na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$nome_doador = $_POST['nome_doador'];
		$telefone_doador = $_POST['telefone_doador'];
		$morada_doador = $_POST['morada_doador'];
		$estado_doador = $_POST['estado_doador'];
		$observacao_doador = $_POST['observacao_doador'];


		if(cadastrarPDOdoador($nome_doador, $telefone_doador, $morada_doador, $estado_doador, $observacao_doador)){
			echo "Doador cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_doadores.php';</script>";
		}else{
			echo "Erro ao cadastrar o Doador...";
		}
	}

		
	 ?>


	<!-- Formulario de registro de Doadores -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Doador</legend>
				  			<div class="form-row">
					    		<div class="col-md-8 mb-3">
					      			<input type="text" class="form-control" name="nome_doador" id="nome_doador" placeholder="Nome do Doador" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
						  				<input type="text" class="form-control" name="telefone_doador" id="telefone_doador" placeholder="Telefone" required>
									</div>
								</div>

								<div class="form-row">
						    		<div class="col-md-8 mb-3">
						      			<input type="text" class="form-control" name="morada_doador" id="morada_doador" placeholder="Morada" required>
						    		</div>
									
									<div class="col-md-8 mb-3">
						  				<input type="text" class="form-control" name="estado_doador" id="estado_doador" placeholder="Estado" required>
									</div>

									<div class="form-group col-md-8 mt-3">
	                <textarea class="form-control" name="observacao_doador" id="observacao_doador" placeholder="Observação" rows="5" required></textarea>
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

