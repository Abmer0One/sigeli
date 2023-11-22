
<?php
  include_once 'menu.php';
?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_materiais.php" class="btn btn-primary">Listar Doação</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_materiais_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>

	<!-- registro de Doação na Base de dados com php --> 
	<?php 
		if(isset($_POST['btRegistar'])){
			$descrisao_doacao = $_POST['descrisao_doacao'];
			$quantidade_doacao = $_POST['quantidade_doacao'];
			$doador = $_POST['doador'];
			$data_doacao = $_POST['data_doacao'];
			$observacao_doacao = $_POST['observacao_doacao'];

			if(cadastrarPDOdoacao($descrisao_doacao, $quantidade_doacao, $doador, $data_doacao, $observacao_doacao)){
				echo "Doação cadastrado com sucesso...";
				echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_materiais.php';</script>";
			}else{
				echo "Erro ao cadastrar a Doação...";
			}
		}
 	?>


	<!-- Formulario de registro de Materiais -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Doacao</legend>
				  			<div class="form-row">

					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="descrisao_doacao" id="descrisao_doacao" placeholder="Descreve a Doação" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="number" class="form-control" name="quantidade_doacao" id="quantidade_doacao" placeholder="Quantidade" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="doador" id="doador" placeholder="Doador" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="date" class="form-control" name="data_doacao" id="data_doacao" placeholder="Data de Doação" required>
									</div>
								</div>

								<div class="form-row">

								<div class="form-group col-md-8 mt-3">
	                <textarea class="form-control" name="observacao_doacao" id="observacao_doacao" placeholder="Observação" rows="5" required></textarea>
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

