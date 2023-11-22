
<?php
    include_once 'menu.php';
    ?>
	<!-- registro de Grupo na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$descrisao_tempo_liturgico = $_POST['descrisao_tempo_liturgico'];
		$descrisao_nome_tempo = $_POST['descrisao_nome_tempo'];
		$descrisao_ano_tempo = $_POST['descrisao_ano_tempo'];

		if(cadastrarPDOtempoLiturgico($descrisao_tempo_liturgico, $descrisao_nome_tempo ,$descrisao_ano_tempo)){
			echo "Tempo Liturgico cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='tempo_liturgico.php';</script>";
		}else{
			echo "Erro ao cadastrar o Tempo Liturgico...";
		}
	}

		
	 ?>


	<!-- Formulario de registro de Tempo Liturgico -->
	<div class="container">
		<div class="row ">
			<div class="col mx-3">
				<div class="mycontent-left">
					<form method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="fieldset mx-2">
								<legend class="legend mx-2 mb-2">Registar Tempo Liturgico</legend>
						  		<div class="form-row">

						  			<div class="col-md-8 mx-3 my-3">
						      			<input type="text" class="form-control" name="descrisao_tempo_liturgico" id="descrisao_tempo_liturgico" placeholder="Descrisão do Tempo Liturgico">
						    		</div>

						    		<div class="col-md-8 mx-3 my-3 form-group mb-3">
			                            <select type="text" id="descrisao_nome_tempo" name="descrisao_nome_tempo" class="form-control" required>
			                            <option selected>Nome do Tempo Liturgico</option>
			                            <option>do Advento</option>
			                            <option>de Natal</option>
			                            <option>do tempo Comum</option>
			                            <option>da Quaresma</option>
			                            <option>da Pascoa</option>
			                            </select>
			                        </div>

						    		<div class="col-md-8 mx-3 my-3 form-group mb-3">
			                            <select type="text" id="descrisao_ano_tempo" name="descrisao_ano_tempo" class="form-control" required>
			                            <option selected>Ano Liturgico</option>
			                            <option>Ano A</option>
			                            <option>Ano B</option>
			                            <option>Ano C</option>
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
			<?php 
				$dados = listarPDOtempoLiturgico(); 
				$d = new ArrayIterator($dados);
			?>

			<div class="col mx-3 mb-5">

				<div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Lista de Tempos Liturgicos</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrisão</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Alterar Dados</th>

                  </tr>
                </thead>
                <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->id_tempo_liturgico. "<br />"; ?></th> 
										<td><?php echo $d->current()->descrisao_nome_tempo. "<br />"; ?></td>
		                <td><?php echo $d->current()->descrisao_tempo_liturgico. "<br />"; ?></td>
		                <td><?php echo $d->current()->descrisao_ano_tempo. "<br />"; ?></td>
                    <td><a href="#">Alterar Dados</a></td>
                  </tr>
                  <?php
                  $d->next();
                  }?>
                </tbody>
              </table>
            </div>
          </div>
			</div>
		</div>



		




	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>

