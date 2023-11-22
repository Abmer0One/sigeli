
<?php
    include_once 'menu.php';
    ?>

	<!-- registro de Membro na Base de dados com php -->
	<?php 
	if(isset($_POST['btRegistar'])){
		$nome_membro = $_POST['nome_membro'];
		$id_grupo = $_SESSION['tipo_nivel'];
		$data_nascimento_membro = $_POST['data_nascimento_membro'];
		$telefone_membro = $_POST['telefone_membro'];
		$email_membro  = $_POST['email_membro'];
		$endereco_membro = $_POST['endereco_membro'];
		$data_sacramento_baptismo = $_POST['data_sacramento_baptismo'];
		$data_sacramento_confirmacao = $_POST['data_sacramento_confirmacao'];
		$data_sacramento_matrimonio = $_POST['data_sacramento_matrimonio'];
		$paroquia_sacramento_baptismo = $_POST['paroquia_sacramento_baptismo'];
		$paroquia_sacramento_confirmacao = $_POST['paroquia_sacramento_confirmacao'];
		$paroquia_sacramento_matrimonio = $_POST['paroquia_sacramento_matrimonio'];
		$data_inicio_membro = $_POST['data_inicio_membro'];
		$data_fim_membro = $_POST['data_fim_membro'];
		
		//********************* CARREGAR FOTO DO MEMBRO *****************************
		if(isset($_FILES['arquiv'])){
		    $arquiv = $_FILES['arquiv']['name'];
		    $extensao = strtolower(pathinfo($arquiv, PATHINFO_EXTENSION));
		    $foto_membro = $nome_membro.".".$extensao;
		    $diretorio = "Imagem_membro/";
		    
		    move_uploaded_file($_FILES['arquiv']['tmp_name'], $diretorio.$foto_membro);
		}

		

		//********************* CARREGAR FOTO DO BAPTISMO *****************************
		if(isset($_FILES['arquiv_baptismo'])){
		    $arquiv_baptismo = $_FILES['arquiv_baptismo']['name'];
		    $extensao = strtolower(pathinfo($arquiv_baptismo, PATHINFO_EXTENSION));
		    $foto_sacramento_baptismo = $nome_membro."_baptismo.".$extensao;
		    $diretoriob = "Imagem_cedula/";
		    if(!is_dir($diretoriob))
				mkdir($diretoriob);
		    move_uploaded_file($_FILES['arquiv_baptismo']['tmp_name'], $diretoriob.$foto_sacramento_baptismo);
		}

		//********************* CARREGAR FOTO DA CONFIRMAÇÃO *****************************
		if(isset($_FILES['arquiv_confirmacao'])){
		    $arquiv_confirmacao = $_FILES['arquiv_confirmacao']['name'];
		    $extensao = strtolower(pathinfo($arquiv_confirmacao, PATHINFO_EXTENSION));
		    $foto_sacramento_confirmacao = $nome_membro."_confirmacao.".$extensao;
		    $diretorioc = "Imagem_cedula/";
		    if(!is_dir($diretorioc))
				mkdir($diretorioc);
		    move_uploaded_file($_FILES['arquiv_confirmacao']['tmp_name'], $diretorioc.$foto_sacramento_confirmacao);
		}

		//********************* CARREGAR FOTO DO MATRIMONIO *****************************
		if(isset($_FILES['arquiv_matrimonio'])){
		    $arquiv_matrimonio = $_FILES['arquiv_matrimonio']['name'];
		    $extensao = strtolower(pathinfo($arquiv_matrimonio, PATHINFO_EXTENSION));
		    $foto_sacramento_matrimonio = $nome_membro."_matrimonio.".$extensao;
		    $diretoriom = "Imagem_cedula/";
		    if(!is_dir($diretoriom))
				mkdir($diretoriom);
		    move_uploaded_file($_FILES['arquiv_matrimonio']['tmp_name'], $diretoriom.$foto_sacramento_matrimonio);
		} 

/*
		$foto_membro =  $nome_membro. '.jpg';
		$filepath = 'Imagem_membro/';
		if(!is_dir($filepath))
			mkdir($filepath);
		if(isset($_FILES['webcam'])){	
			move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$foto_membro);
			//$sql="Insert into membro(foto_membro) values('$foto_membro')";
			//$result=mysqli_query($con,$sql);
			//echo $filepath.$foto_membro;

		}*/

		if(cadastrarPDOmembro($nome_membro, $id_grupo, $data_nascimento_membro, $telefone_membro, $email_membro, $endereco_membro, $foto_membro, $foto_sacramento_baptismo, $foto_sacramento_confirmacao, $foto_sacramento_matrimonio, $data_sacramento_baptismo, $data_sacramento_confirmacao, $data_sacramento_matrimonio, $paroquia_sacramento_baptismo, $paroquia_sacramento_confirmacao, $paroquia_sacramento_matrimonio, $data_inicio_membro, $data_fim_membro)){
			echo "Membro cadastrado com sucesso...";
			echo "<script>alert('Inscrição feita com sucesso');window.location.href='registar_membros.php';</script>";
		}else{
			echo "Erro ao cadastrar o Membro...";
		}
	}
	 ?>


	<!-- Formulario de registro de Membros -->
<div class="container">
	<div class="row ">
		<div class="mycontent-left">
			<div class="col-sm-12 d-flex flex-column align-items-center text-center">
              <a class="btn btn-primary mx-3 my-3" href="listar_membros.php" role="button">Ver lista de membros</a>
            </div>
            <hr>
          		<!-- 
							<style>
							#my_camera{
							 width: 320px;
							 height: 240px;
							 border: 1px solid blue;
							 border-radius: 300px;
							}
							</style>

						   
							<center>
							<div id="my_camera" name="webcam"></div>
							<br />
							<input type=button value="Take Snapshot" onClick="take_snapshot()">
							<div id="results" ></div>
							 </center>
 							
							<script type="text/javascript" src="../assets/js/webcam.min.js"></script>
 							
							<script language="JavaScript">

							 // Configure a few settings and attach camera
							 Webcam.attach( '#my_camera' );
							function take_snapshot() {

							 // take snapshot and get image data
							 Webcam.snap( function(data_uri) {
							    Webcam.upload(data_uri, 'webcam', function(code, text,Name) {
							                    document.getElementById('results').innerHTML = 
							                    '' + 
										'<img src="' + data_uri + '"style=" width: 300px;">';
							 			} );
								}   );
							}

							</script>
			-->
            	
          	</button>
			<form method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="fieldset mx-2">
						<legend class="legend mx-2 mb-2">Inserir os Dados do Membro</legend>
						<div class="form-row">
							<div class="col-md-8 mx-2">
								<label for="validationTooltip01 mx-2">Foto do Membro</label>
							</div>

			                <div class="col-md-12 mb-3 mx-2">
							    <input type="file" class="custom-file-input" name="arquiv" id="validatedCustomFile" required>
							    <label class="custom-file-label" for="validatedCustomFile"></label>
							    <div class="invalid-feedback">Ficheiro Invalido</div>
						    </div>
 
 

					    </div>

				  		<div class="form-row">
				    		<div class="form-group mx-3">
				    			<label for="validationTooltip01 mx-2">Nome</label>
				      			<input type="text" class="form-control" name="nome_membro" id="nome_membro" placeholder="Nome do Membro" required>
				    		</div>
				    		
							
							<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Data de Nascimento</label>
				  				<input type="date" class="form-control" name="data_nascimento_membro" id="data_nascimento_membro" placeholder="Data de Nascimento" required>
							</div>
							<div class="form-group mx-3">
								<label for="validationTooltip01 mx-2">Telefone</label>
				  				<input type="number" class="form-control" name="telefone_membro" id="telefone_membro" placeholder="Telefone" required>
							</div>
							</div>

							<div class="form-row">
								<div class="form-group mx-3">
									<label for="validationTooltip01 mx-2">Email</label>
					      			<input type="email" class="form-control" name="email_membro" id="email_membro" placeholder="Email" >
					    		</div>
					    		
					    		<div class="form-group mx-3">
					    			<label for="validationTooltip01 mx-2">Morada</label>
					      			<input type="text" class="form-control" name="endereco_membro" id="endereco_membro" placeholder="Morada" required>
					    		</div>

				    			<div class="form-group mx-3">
					    			<label for="validationTooltip01 mx-2">Data de Inicio no grupo</label>
					      			<input type="date" class="form-control" name="data_inicio_membro" id="data_inicio_membro" placeholder="Data de Inicio" >
					    		</div>

					    		<div class="form-group mx-3">
					    			<label for="validationTooltip01 mx-2">Data de Fim no grupo</label>
					      			<input type="date" class="form-control" name="data_fim_membro" id="data_fim_membro" placeholder="Data do Fim">
					    		</div>
							</div>


							<hr>
				    		<div class="form-row">
								<div class="col-md-8 mx-2">
									<label for="validationTooltip01 mx-2">Foto da Cedula do Baptismo</label>
								</div>
				                <div class="col-md-12 mb-3 mx-2">
								    <input type="file" class="custom-file-input" name="arquiv_baptismo" id="validatedCustomFile" >
								    <label class="custom-file-label" for="validatedCustomFile"></label>
								    <div class="invalid-feedback">Ficheiro Invalido</div>
							    </div>
						    </div>

						    <div class="form-row">
								<div class="form-group mx-3">
									<label for="validationTooltip01 mx-2">Data do Baptismo</label>
					      			<input type="date" class="form-control" name="data_sacramento_baptismo" id="data_sacramento_baptismo" placeholder="Data do Baptismo">
					    		</div>
					    		
					    		<div class="form-group mx-3">
					    			<label for="validationTooltip01 mx-2">Paroquia do Baptismo</label>
					      			<input type="text" class="form-control" name="paroquia_sacramento_baptismo" id="paroquia_sacramento_baptismo" placeholder="Paroquia">
					    		</div>
							</div>

							<hr>
				    		<div class="form-row">
								<div class="col-md-8 mx-2">
									<label for="validationTooltip01 mx-2">Foto da Cedula do Confirmação</label>
								</div>
				                <div class="col-md-12 mb-3 mx-2">
								    <input type="file" class="custom-file-input" name="arquiv_confirmacao" id="validatedCustomFile">
								    <label class="custom-file-label" for="validatedCustomFile"></label>
								    <div class="invalid-feedback">Ficheiro Invalido</div>
							    </div>
						    </div>

						    <div class="form-row">
								<div class="form-group mx-3">
									<label for="validationTooltip01 mx-2">Data da Confirmação</label>
					      			<input type="date" class="form-control" name="data_sacramento_confirmacao" id="data_sacramento_confirmacao" placeholder="Data da Confirmação">
					    		</div>
					    		
					    		<div class="form-group mx-3">
					    			<label for="validationTooltip01 mx-2">Paroquia da Confirmação</label>
					      			<input type="text" class="form-control" name="paroquia_sacramento_confirmacao" id="paroquia_sacramento_confirmacao" placeholder="Paroquia">
					    		</div>
							</div>
				    		
				    		<hr>
				    		<div class="form-row">
								<div class="col-md-8 mx-2">
									<label for="validationTooltip01 mx-2">Foto da Cedula do Matrimonio</label>
								</div>
				                <div class="col-md-12 mb-3 mx-2">
								    <input type="file" class="custom-file-input" name="arquiv_matrimonio" id="validatedCustomFile" >
								    <label class="custom-file-label" for="validatedCustomFile"></label>
								    <div class="invalid-feedback">Ficheiro Invalido</div>
							    </div>
						    </div>

						    <div class="form-row">
								<div class="form-group mx-3">
									<label for="validationTooltip01 mx-2">Data do Matrimonio</label>
					      			<input type="date" class="form-control" name="data_sacramento_matrimonio" id="data_sacramento_matrimonio" placeholder="Data do Matrimonio">
					    		</div>
					    		
					    		<div class="form-group mx-3">
					    			<label for="validationTooltip01 mx-2">Paroquia do Matrimonio</label>
					      			<input type="text" class="form-control" name="paroquia_sacramento_matrimonio" id="paroquia_sacramento_matrimonio" placeholder="Paroquia">
					    		</div>
							</div>
			    		</div>
						<hr>
						<button type="submit" name="btRegistar" id="btRegistar" class="btn btn-primary mx-3 mb-4">Registar</button>
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

