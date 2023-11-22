
<?php
  include_once 'menu.php';
?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_emprestimo.php" class="btn btn-primary">Listar Emprestimo</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_emprestimo_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>

	<!-- registro de Emprestimo na Base de dados com php --> 
	<?php 
		if(isset($_POST['btRegistar'])){
			$material_emprestimo = $_POST['material_emprestimo'];
			$quantidade_emprestimo = $_POST['quantidade_emprestimo'];
			$responsavel_emprestimo = $_POST['responsavel_emprestimo'];
			$data_emprestimo = $_POST['data_emprestimo'];
			$data_entrega = $_POST['data_entrega'];
			$observacao_emprestimo = $_POST['observacao_emprestimo'];

			if(cadastrarPDOemprestimo($material_emprestimo, $quantidade_emprestimo, $responsavel_emprestimo, $data_emprestimo, $data_entrega, $observacao_emprestimo)){
				echo "Emprestimo cadastrado com sucesso...";
				echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_emprestimo.php';</script>";
			}else{
				echo "Erro ao cadastrar o Emprestimo...";
			}
		}
 	?>


	<!-- Formulario de registro de Emprestimo -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Emprestimo</legend>
				  			<div class="form-row">

					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="material_emprestimo" id="material_emprestimo" placeholder="Material" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="text" class="form-control" name="quantidade_emprestimo" id="quantidade_emprestimo" placeholder="Quantidade" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="responsavel_emprestimo" id="responsavel_emprestimo" placeholder="Responsavel" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="date" class="form-control" name="data_emprestimo" id="data_emprestimo" placeholder="Data de Emprestimo" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="date" class="form-control" name="data_entrega" id="data_entrega" placeholder="Data de Entrega" required>
					    		</div>
								
								<div class="col-md-8 mb-3">
				  				<input type="text" class="form-control" name="observacao_emprestimo" id="observacao_emprestimo" placeholder="Observação" required>
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

