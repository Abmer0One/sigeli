
<?php
    include_once 'menu.php';
    ?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_patrimonio.php" class="btn btn-primary">Listar Patrimonio</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_patrimonio_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<!-- registro de Patrimonio na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$descrisao_patrimonio = $_POST['descrisao_patrimonio'];
		$local_patrimonio = $_POST['local_patrimonio'];
		$quantidade_patrimonio = $_POST['quantidade_patrimonio'];
		$observacao_patrimonio = $_POST['observacao_patrimonio'];


		if(cadastrarPDOpatrimonio($descrisao_patrimonio, $local_patrimonio, $quantidade_patrimonio, $observacao_patrimonio)){
			echo "Patrimonio cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_patrimonio.php';</script>";
		}else{
			echo "Erro ao cadastrar o Patrimonio...";
		}
	}

		
	 ?>


	<!-- Formulario de registro de Patrimonio -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Patrimonio</legend>
				  			<div class="form-row">
					    		<div class="col-md-8 mb-3">
					      			<input type="text" class="form-control" name="descrisao_patrimonio" id="descrisao_patrimonio" placeholder="Descrisão" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
						  				<input type="text" class="form-control" name="local_patrimonio" id="local_patrimonio" placeholder="Local" required>
									</div>
								</div>

								<div class="form-row">
						    		<div class="col-md-8 mb-3">
						      			<input type="text" class="form-control" name="quantidade_patrimonio" id="quantidade_patrimonio" placeholder="Quantidade" required>
						    		</div>
									
									<div class="col-md-8 mb-3">
						  				<input type="text" class="form-control" name="observacao_patrimonio" id="observacao_patrimonio" placeholder="Observação" required>
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

