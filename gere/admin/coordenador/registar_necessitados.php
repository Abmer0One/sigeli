
<?php
  include_once 'menu.php';
?>

    <div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_necessitados.php" class="btn btn-primary">Listar Necessitados</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_necessitados_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>

	<!-- registro de Emprestimo na Base de dados com php --> 
	<?php 
		if(isset($_POST['btRegistar'])){
			
			$nome_necessitado = $_POST['nome_necessitado'];
			$morada_necessitado = $_POST['morada_necessitado'];
			$telefone_necessitado = $_POST['telefone_necessitado'];
			$estado_necessitado = $_POST['estado_necessitado'];
			$idade_necessitado = $_POST['idade_necessitado'];
			$observacao_necessitado = $_POST['observacao_necessitado'];

			if(cadastrarPDOnecessitado($nome_necessitado, $morada_necessitado, $telefone_necessitado, $estado_necessitado, $idade_necessitado, $observacao_necessitado)){
				echo "Necessitado cadastrado com sucesso...";
				echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_necessitados.php';</script>";
			}else{
				echo "Erro ao cadastrar o Necessitado...";
			}
		}
 	?>


	<!-- Formulario de registro de Necessitado -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Necessitado</legend>
				  			<div class="form-row">

					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="nome_necessitado" id="nome_necessitado" placeholder="Nome" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="text" class="form-control" name="morada_necessitado" id="morada_necessitado" placeholder="Morada" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="number" class="form-control" name="idade_necessitado" id="idade_necessitado" placeholder="Idade" required>
					    		</div>
								
									<div class="col-md-8 mb-3">
					  				<input type="number" class="form-control" name="telefone_necessitado" id="telefone_necessitado" placeholder="Telefone" required>
									</div>
								</div>

								<div class="form-row">
					    		<div class="col-md-8 mb-3">
				      			<input type="text" class="form-control" name="estado_necessitado" id="estado_necessitado" placeholder="Estado" required>
					    		</div>

					    		<div class="form-group col-md-8 mt-3">
	                <textarea class="form-control" name="observacao_necessitado" id="observacao_necessitado" placeholder="Observação" rows="5" required></textarea>
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

