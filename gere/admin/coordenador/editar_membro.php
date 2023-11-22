<?php
include_once 'menu.php';
ob_start();

$id_membro = filter_input(INPUT_GET, "id_membro", FILTER_SANITIZE_NUMBER_INT);

if (empty($id_membro)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    exit();
}

$query_usuario = "SELECT id_membro, nome_membro, id_grupo, data_nascimento_membro, telefone_membro, email_membro, endereco_membro, foto_membro, foto_sacramento_baptismo, foto_sacramento_confirmacao, foto_sacramento_matrimonio, data_sacramento_baptismo, data_sacramento_confirmacao, data_sacramento_matrimonio, paroquia_sacramento_baptismo, paroquia_sacramento_confirmacao, paroquia_sacramento_matrimonio, data_inicio_membro, data_fim_membro FROM membro WHERE id_membro = $id_membro LIMIT 1";

$pdo = conectarPDO();
$result_usuario = $pdo->prepare($query_usuario);
$result_usuario->execute();

if (($result_usuario) AND ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    //var_dump($row_usuario);
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    exit();
}
?>


        
        <?php
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão
        if (!empty($dados['EditUsuario'])) {

     

            //********************* CARREGAR FOTO DO MEMBRO *****************************
			if(isset($_FILES['arquiv'])){
			    $arquiv = $_FILES['arquiv']['name'];
			    $extensao = strtolower(pathinfo($arquiv, PATHINFO_EXTENSION));
			    $foto_membro = $dados['nome_membro'].".".$extensao;
			    $diretorio = "Imagem_membro/";
			    
			    move_uploaded_file($_FILES['arquiv']['tmp_name'], $diretorio.$foto_membro);
			}

			

			//********************* CARREGAR FOTO DO BAPTISMO *****************************
			if(isset($_FILES['arquiv_baptismo'])){
			    $arquiv_baptismo = $_FILES['arquiv_baptismo']['name'];
			    $extensao = strtolower(pathinfo($arquiv_baptismo, PATHINFO_EXTENSION));
			    $foto_sacramento_baptismo = $dados['nome_membro']."_baptismo.".$extensao;
			    $diretoriob = "Imagem_cedula/";
			    if(!is_dir($diretoriob))
					mkdir($diretoriob);
			    move_uploaded_file($_FILES['arquiv_baptismo']['tmp_name'], $diretoriob.$foto_sacramento_baptismo);
			}

			//********************* CARREGAR FOTO DA CONFIRMAÇÃO *****************************
			if(isset($_FILES['arquiv_confirmacao'])){
			    $arquiv_confirmacao = $_FILES['arquiv_confirmacao']['name'];
			    $extensao = strtolower(pathinfo($arquiv_confirmacao, PATHINFO_EXTENSION));
			    $foto_sacramento_confirmacao = $dados['nome_membro']."_confirmacao.".$extensao;
			    $diretorioc = "Imagem_cedula/";
			    if(!is_dir($diretorioc))
					mkdir($diretorioc);
			    move_uploaded_file($_FILES['arquiv_confirmacao']['tmp_name'], $diretorioc.$foto_sacramento_confirmacao);
			}

			//********************* CARREGAR FOTO DO MATRIMONIO *****************************
			if(isset($_FILES['arquiv_matrimonio'])){
			    $arquiv_matrimonio = $_FILES['arquiv_matrimonio']['name'];
			    $extensao = strtolower(pathinfo($arquiv_matrimonio, PATHINFO_EXTENSION));
			    $foto_sacramento_matrimonio = $dados['nome_membro']."_matrimonio.".$extensao;
			    $diretoriom = "Imagem_cedula/";
			    if(!is_dir($diretoriom))
					mkdir($diretoriom);
			    move_uploaded_file($_FILES['arquiv_matrimonio']['tmp_name'], $diretoriom.$foto_sacramento_matrimonio);
			} 


            $empty_input = false;
            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
            } 

            if (!$empty_input) { 
                $query_up_usuario= "UPDATE membro SET nome_membro = :nome_membro, id_grupo = :id_grupo, data_nascimento_membro = :data_nascimento_membro, telefone_membro = :telefone_membro, email_membro = :email_membro, endereco_membro = :endereco_membro, foto_membro = :foto_membro, foto_sacramento_baptismo = :foto_sacramento_baptismo, foto_sacramento_confirmacao = :foto_sacramento_confirmacao, foto_sacramento_matrimonio = :foto_sacramento_matrimonio, data_sacramento_baptismo = :data_sacramento_baptismo, data_sacramento_confirmacao = :data_sacramento_confirmacao, data_sacramento_matrimonio = :data_sacramento_matrimonio, paroquia_sacramento_baptismo = :paroquia_sacramento_baptismo, paroquia_sacramento_confirmacao = :paroquia_sacramento_confirmacao, paroquia_sacramento_matrimonio = :paroquia_sacramento_matrimonio, data_inicio_membro = :data_inicio_membro, data_fim_membro = :data_fim_membro WHERE id_membro = :id_membro";
                $pdo = conectarPDO();
                $edit_usuario = $pdo->prepare($query_up_usuario);
                $edit_usuario->bindParam(':nome_membro', $dados['nome_membro'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id_grupo', $dados['id_grupo'], PDO::PARAM_INT);
                $edit_usuario->bindParam(':data_nascimento_membro', $data_nascimento_membro, PDO::PARAM_STR);
                $edit_usuario->bindParam(':telefone_membro', $telefone_membro, PDO::PARAM_INT);
                $edit_usuario->bindParam(':email_membro', $dados['email_membro'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':endereco_membro', $dados['endereco_membro'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':foto_membro', $foto_membro, PDO::PARAM_STR);
                $edit_usuario->bindParam(':foto_sacramento_baptismo', $foto_sacramento_baptismo, PDO::PARAM_STR);
                $edit_usuario->bindParam(':foto_sacramento_confirmacao', $foto_sacramento_confirmacao, PDO::PARAM_STR);
                $edit_usuario->bindParam(':foto_sacramento_matrimonio', $foto_sacramento_matrimonio, PDO::PARAM_STR);
                $edit_usuario->bindParam(':data_sacramento_baptismo', $dados['data_sacramento_baptismo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':data_sacramento_confirmacao', $dados['data_sacramento_confirmacao'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':data_sacramento_matrimonio', $dados['data_sacramento_matrimonio'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':paroquia_sacramento_baptismo', $dados['paroquia_sacramento_baptismo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':paroquia_sacramento_confirmacao', $dados['paroquia_sacramento_confirmacao'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':paroquia_sacramento_matrimonio', $dados['paroquia_sacramento_matrimonio'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':data_inicio_membro', $dados['data_inicio_membro'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':data_fim_membro', $dados['data_fim_membro'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id_membro', $id_membro, PDO::PARAM_INT);

                if($edit_usuario->execute()){
                    echo "Membro alterado com sucesso...";
                    echo "<script>alert('Alteração feita com sucesso');window.location.href='ver_membro.php';</script>";
                }else{
                    echo "Membro não alterado com sucesso...";
                    echo "<script>alert('Alteração não feita com sucesso');window.location.href='ver_membro.php';</script>";
                }
            }
        }
        ?>

        <form id="edit-usuario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <div class="fieldset mx-2">
                	<legend class="legend mx-2 mb-2">Alterar os Dados do Membro</legend>
                    <div class="form-row">

							<div class="col-md-6 mx-3">
								<label for="validationTooltip01 mx-2">Foto do Membro</label>
							</div>

			                <div class="col-md-6 my-3 mx-3">
							    <input type="file" class="custom-file-input" name="arquiv" id="validatedCustomFile" required>
							    <label class="custom-file-label" for="validatedCustomFile"></label>
							    <div class="invalid-feedback">Ficheiro Invalido</div>
						    </div>
					    

			            <div class="col-md-6 mx-2 my-3">
			            <input type="text" class = "form-control" name = "nome_membro" id="nome_membro" placeholder="Nome do Membro" value = "<?php
			            if (isset($dados['nome_membro'])) {
			                echo $dados['nome_membro'];
			            } elseif (isset($row_usuario['nome_membro'])) {
			                echo $row_usuario['nome_membro'];
			            }
			            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
			                <select type="number" id="id_grupo" name="id_grupo" class="form-control" required> 
			                    <option value="<?php if (isset($dados['id_grupo'])) {
			                        $dadosg = listarPDOgrupo(); 
			                        $dg = new ArrayIterator($dadosg);
			                        while($dg->valid()){
			                            echo $dg->current()->nome_grupo. "<br/>";
			                        }
			                    } elseif (isset($row_usuario['id_grupo'])) {
			                        $dadosy = listarPDOgrupo(); 
			                        $dy = new ArrayIterator($dadosy);
			                        while($dy->valid()){
			                            echo $dy->current()->nome_grupo. "<br/>";

			                            $dy->next();
			                        }
			                    }
			                        ?>">Grupo</option>
			                    
			                   <?php if (isset($dados['id_grupo'])) {
			                        $dadosg = listarPDOgrupo(); 
			                        $dg = new ArrayIterator($dadosg);
			                        while($dg->valid()){?>
			                            <option value="<?php echo $dg->current()->id_grupo?>"><?php echo $dg->current()->nome_grupo. "<br/>"; ?></option>
			                           
			                     <?php $dy->next(); }
			                    } elseif (isset($row_usuario['id_grupo'])) {
			                        $dadosy = listarPDOgrupo(); 
			                        $dy = new ArrayIterator($dadosy);
			                        while($dy->valid()){?>
			                            <option value="<?php echo $dy->current()->id_grupo?>"><?php echo $dy->current()->nome_grupo. "<br/>"; ?></option>
			                            <?php
			                            $dy->next();
			                        }
			                    }
			                            ?>
			                            
			                </select>
			            </div>
			           
			           <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="data_nascimento_membro" id="data_nascimento_membro" placeholder="Data de Nascimento" value="<?php
				            if (isset($dados['data_nascimento_membro'])) {
				                echo $dados['data_nascimento_membro'];
				            } elseif (isset($row_usuario['data_nascimento_membro'])) {
				                echo $row_usuario['data_nascimento_membro'];
				            }
				            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
				           <input type="number" class="form-control" name="telefone_membro" id="telefone_membro" placeholder="Telefone" value="<?php
				            if (isset($dados['telefone_membro'])) {
				                echo $dados['telefone_membro'];
				            } elseif (isset($row_usuario['telefone_membro'])) {
				                echo $row_usuario['telefone_membro'];
				            }
				            ?>" >
			            </div>


			            <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="email_membro" id="email_membro" placeholder="Email" value="<?php
				            if (isset($dados['email_membro'])) {
				                echo $dados['email_membro'];
				            } elseif (isset($row_usuario['email_membro'])) {
				                echo $row_usuario['email_membro'];
				            }
				            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="endereco_membro" id="endereco_membro" placeholder="Endereço" value="<?php
				            if (isset($dados['endereco_membro'])) {
				                echo $dados['endereco_membro'];
				            } elseif (isset($row_usuario['endereco_membro'])) {
				                echo $row_usuario['endereco_membro'];
				            }
				            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="data_inicio_membro" id="data_inicio_membro" placeholder="Data de Inicio" value="<?php
				            if (isset($dados['data_inicio_membro'])) {
				                echo $dados['data_inicio_membro'];
				            } elseif (isset($row_usuario['data_inicio_membro'])) {
				                echo $row_usuario['data_inicio_membro'];
				            }
				            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="data_fim_membro" id="data_fim_membro" placeholder="Data de Fim" value="<?php
				            if (isset($dados['data_fim_membro'])) {
				                echo $dados['data_fim_membro'];
				            } elseif (isset($row_usuario['data_fim_membro'])) {
				                echo $row_usuario['data_fim_membro'];
				            }
				            ?>" >
			            </div>

			            <hr>
						<div class="col-md-6 mx-3">
							<label for="validationTooltip01 mx-2">Foto da Cedula do Baptismo</label>
						</div>
		                <div class="col-md-6 mb-3 mx-3">
						    <input type="file" class="custom-file-input" name="arquiv_baptismo" id="validatedCustomFile" required>
						    <label class="custom-file-label" for="validatedCustomFile"></label>
						    <div class="invalid-feedback">Ficheiro Invalido</div>
					    </div>



					    <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="data_sacramento_baptismo" id="data_sacramento_baptismo" placeholder="Data Sacramento Baptismo" value="<?php
				            if (isset($dados['data_sacramento_baptismo'])) {
				                echo $dados['data_sacramento_baptismo'];
				            } elseif (isset($row_usuario['data_sacramento_baptismo'])) {
				                echo $row_usuario['data_sacramento_baptismo'];
				            }
				            ?>" >
			            </div>


			            <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="paroquia_sacramento_baptismo" id="paroquia_sacramento_baptismo" placeholder="Paroquia Sacramento Baptismo" value="<?php
				            if (isset($dados['paroquia_sacramento_baptismo'])) {
				                echo $dados['paroquia_sacramento_baptismo'];
				            } elseif (isset($row_usuario['paroquia_sacramento_baptismo'])) {
				                echo $row_usuario['paroquia_sacramento_baptismo'];
				            }
				            ?>" >
			            </div>


			            <hr>
						<div class="col-md-6 mx-3">
							<label for="validationTooltip01 mx-2">Foto da Cedula do Confirmação</label>
						</div>
		                <div class="col-md-6 mx-3">
						    <input type="file" class="custom-file-input" name="arquiv_confirmacao" id="validatedCustomFile" required>
						    <label class="custom-file-label" for="validatedCustomFile"></label>
						    <div class="invalid-feedback">Ficheiro Invalido</div>
					    </div>



					    <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="data_sacramento_confirmacao" id="data_sacramento_confirmacao" placeholder="Data Sacramento Confirmação" value="<?php
				            if (isset($dados['data_sacramento_confirmacao'])) {
				                echo $dados['data_sacramento_confirmacao'];
				            } elseif (isset($row_usuario['data_sacramento_confirmacao'])) {
				                echo $row_usuario['data_sacramento_confirmacao'];
				            }
				            ?>" >
			            </div>


			            <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="paroquia_sacramento_confirmacao" id="paroquia_sacramento_confirmacao" placeholder="Paroquia Sacramento Confirmação" value="<?php
				            if (isset($dados['paroquia_sacramento_confirmacao'])) {
				                echo $dados['paroquia_sacramento_confirmacao'];
				            } elseif (isset($row_usuario['paroquia_sacramento_confirmacao'])) {
				                echo $row_usuario['paroquia_sacramento_confirmacao'];
				            }
				            ?>" >
			            </div>
					    


					    <hr>
						<div class="col-md-6 mx-3">
							<label for="validationTooltip01 mx-2">Foto da Cedula do Matrimonio</label>
						</div>
		                <div class="col-md-6 mx-3">
						    <input type="file" class="custom-file-input" name="arquiv_matrimonio" id="validatedCustomFile" required>
						    <label class="custom-file-label" for="validatedCustomFile"></label>
						    <div class="invalid-feedback">Ficheiro Invalido</div>
					    </div>



					    <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="data_sacramento_matrimonio" id="data_sacramento_matrimonio" placeholder="Data Sacramento Matrimonio" value="<?php
				            if (isset($dados['data_sacramento_matrimonio'])) {
				                echo $dados['data_sacramento_matrimonio'];
				            } elseif (isset($row_usuario['data_sacramento_matrimonio'])) {
				                echo $row_usuario['data_sacramento_matrimonio'];
				            }
				            ?>" >
			            </div>


			            <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="paroquia_sacramento_matrimonio" id="paroquia_sacramento_matrimonio" placeholder="Paroquia Sacramento Matrimonio" value="<?php
				            if (isset($dados['paroquia_sacramento_matrimonio'])) {
				                echo $dados['paroquia_sacramento_matrimonio'];
				            } elseif (isset($row_usuario['paroquia_sacramento_matrimonio'])) {
				                echo $row_usuario['paroquia_sacramento_matrimonio'];
				            }
				            ?>" >
			            </div>

			            
    				</div>
    			</div>
    			<hr>
	            <button type="submit" name="EditUsuario" id="EditUsuario" class="btn btn-primary mx-3 mb-4" value="registar">Alterar</button>
	            <button type="submit" id="btCancelar" class="btn btn-danger mx-3 mb-4">Cancelar</button>
    		</fieldset>
		</form>
   