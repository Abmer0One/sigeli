<?php
include_once 'menu.php';
ob_start();

$id_grupo = filter_input(INPUT_GET, "id_grupo", FILTER_SANITIZE_NUMBER_INT);

if (empty($id_grupo)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    exit();
}

$query_usuario = "SELECT id_grupo, nome_grupo, carisma_grupo, imagem_grupo, regulamento_grupo, fundacao_grupo, padroeiro_grupo, id_tipo_grupo, quantidade_membros_grupo, id_comissao FROM grupo WHERE id_grupo = $id_grupo LIMIT 1";

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

        	if (isset($_FILES['arquivo_regulamento'])) {
                $arquivo_regulamento = $_FILES['arquivo_regulamento']['name'];
                $extensao_r = strtolower(pathinfo($arquivo_regulamento, PATHINFO_EXTENSION));
                $regulamento_grupo =$dados['nome_grupo'].".".$extensao_r;
                $diretorior = "Regulamento_grupo/";
                if(!is_dir($diretorior))
                    mkdir($diretorior);
                move_uploaded_file($_FILES['arquivo_regulamento']['tmp_name'], $diretorior . $regulamento_grupo);
            }


            if(isset($_FILES['arquivo'])){
                $arquivo = $_FILES['arquivo']['name'];
                $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
                $imagem_grupo = $dados['nome_grupo'].".".$extensao;
                $diretorio = "Imagem_grupo/";
                if(!is_dir($diretorio))
                    mkdir($diretorio);
                move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $imagem_grupo);
            }


            $empty_input = false;
            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
            } 

            if (!$empty_input) { 
                $query_up_usuario= "UPDATE grupo SET nome_grupo=:nome_grupo, carisma_grupo=:carisma_grupo, imagem_grupo=:imagem_grupo, regulamento_grupo=:regulamento_grupo, fundacao_grupo=:fundacao_grupo, padroeiro_grupo=:padroeiro_grupo, id_tipo_grupo=:id_tipo_grupo, quantidade_membros_grupo=:quantidade_membros_grupo, id_comissao=:id_comissao WHERE id_grupo=:id_grupo";
                $pdo = conectarPDO();
                $edit_usuario = $pdo->prepare($query_up_usuario);
                $edit_usuario->bindParam(':nome_grupo', $dados['nome_grupo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':carisma_grupo', $dados['carisma_grupo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':imagem_grupo', $imagem_grupo, PDO::PARAM_STR);
                $edit_usuario->bindParam(':regulamento_grupo', $regulamento_grupo, PDO::PARAM_STR);
                $edit_usuario->bindParam(':fundacao_grupo', $dados['fundacao_grupo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':padroeiro_grupo', $dados['padroeiro_grupo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id_tipo_grupo', $dados['id_tipo_grupo'], PDO::PARAM_INT);
                $edit_usuario->bindParam(':quantidade_membros_grupo', $dados['quantidade_membros_grupo'], PDO::PARAM_INT);
                $edit_usuario->bindParam(':id_comissao', $dados['id_comissao'], PDO::PARAM_INT);
                $edit_usuario->bindParam(':id_grupo', $id_grupo, PDO::PARAM_INT);
                if($edit_usuario->execute()){
                    echo "Grupo alterado com sucesso...";
                    echo "<script>alert('Alteração feita com sucesso');window.location.href='ver_grupo.php';</script>";
                }else{
                    echo "Grupo não alterado com sucesso...";
                    echo "<script>alert('Alteração não feita com sucesso');window.location.href='ver_grupo.php';</script>";
                }
            }
        }
        ?>

        <form id="edit-usuario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <div class="fieldset mx-2">
                	<legend class="legend mx-2 mb-2">Alterar os Dados do Grupo</legend>
                    <div class="form-row">

			            <div class="col-md-6 mx-2 my-3">
			            <input type="text" class="form-control" name="nome_grupo" id="nome_grupo" placeholder="Nome do Grupo" value="<?php
			            if (isset($dados['nome_grupo'])) {
			                echo $dados['nome_grupo'];
			            } elseif (isset($row_usuario['nome_grupo'])) {
			                echo $row_usuario['nome_grupo'];
			            }
			            ?>" >
			            </div>


			            <div class="col-md-6 mx-2 my-3">
			                <select type="number" id="id_comissao" name="id_comissao" class="form-control" required> 
			                    <option value="<?php if (isset($dados['id_comissao'])) {
			                        $dadosg = listarPDOcomissao(); 
			                        $dg = new ArrayIterator($dadosg);
			                        while($dg->valid()){
			                            echo $dg->current()->nome_comissao. "<br/>";
			                        }
			                    } elseif (isset($row_usuario['id_comissao'])) {
			                        $dadosy = listarPDOcomissao(); 
			                        $dy = new ArrayIterator($dadosy);
			                        while($dy->valid()){
			                            echo $dy->current()->nome_comissao. "<br/>";

			                            $dy->next();
			                        }
			                    }
			                        ?>">Comissão</option>
			                    
			                   <?php if (isset($dados['id_comissao'])) {
			                        $dadosg = listarPDOcomissao(); 
			                        $dg = new ArrayIterator($dadosg);
			                        while($dg->valid()){?>
			                            <option value="<?php echo $dg->current()->id_comissao?>"><?php echo $dg->current()->nome_comissao. "<br/>"; ?></option>
			                           
			                     <?php $dy->next(); }
			                    } elseif (isset($row_usuario['id_comissao'])) {
			                        $dadosy = listarPDOcomissao(); 
			                        $dy = new ArrayIterator($dadosy);
			                        while($dy->valid()){?>
			                            <option value="<?php echo $dy->current()->id_comissao?>"><?php echo $dy->current()->nome_comissao. "<br/>"; ?></option>
			                            <?php
			                            $dy->next();
			                        }
			                    }
			                            ?>
			                            
			                </select>
			            </div>
			           
			           <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="carisma_grupo" id="carisma_grupo" placeholder="Carisma do Grupo" value="<?php
				            if (isset($dados['carisma_grupo'])) {
				                echo $dados['carisma_grupo'];
				            } elseif (isset($row_usuario['carisma_grupo'])) {
				                echo $row_usuario['carisma_grupo'];
				            }
				            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
				           <input type="date" class="form-control" name="fundacao_grupo" id="fundacao_grupo" placeholder="Data de Fundação" value="<?php
				            if (isset($dados['fundacao_grupo'])) {
				                echo $dados['fundacao_grupo'];
				            } elseif (isset($row_usuario['fundacao_grupo'])) {
				                echo $row_usuario['fundacao_grupo'];
				            }
				            ?>" >
			            </div>

			            <div class="col-md-6 mx-2 my-3">
			                <select type="number" id="id_tipo_grupo" name="id_tipo_grupo" class="form-control" required> 
			                    <option value="<?php if (isset($dados['id_tipo_grupo'])) {
			                        $dadosg = listarPDOtipogrupo(); 
			                        $dg = new ArrayIterator($dadosg);
			                        while($dg->valid()){
			                            echo $dg->current()->nome_tipo_grupo. "<br/>";
			                        }
			                    } elseif (isset($row_usuario['id_tipo_grupo'])) {
			                        $dadosy = listarPDOtipogrupo(); 
			                        $dy = new ArrayIterator($dadosy);
			                        while($dy->valid()){
			                            echo $dy->current()->nome_tipo_grupo. "<br/>";

			                            $dy->next();
			                        }
			                    }
			                        ?>">Tipo de Grupo</option>
			                    
			                   <?php if (isset($dados['id_tipo_grupo'])) {
			                        $dadosg = listarPDOtipogrupo(); 
			                        $dg = new ArrayIterator($dadosg);
			                        while($dg->valid()){?>
			                            <option value="<?php echo $dg->current()->id_tipo_grupo?>"><?php echo $dg->current()->nome_tipo_grupo. "<br/>"; ?></option>
			                           
			                     <?php $dy->next(); }
			                    } elseif (isset($row_usuario['id_tipo_grupo'])) {
			                        $dadosy = listarPDOtipogrupo(); 
			                        $dy = new ArrayIterator($dadosy);
			                        while($dy->valid()){?>
			                            <option value="<?php echo $dy->current()->id_tipo_grupo?>"><?php echo $dy->current()->nome_tipo_grupo. "<br/>"; ?></option>
			                            <?php
			                            $dy->next();
			                        }
			                    }
			                            ?>
			                            
			                </select>
			            </div>

			            <div class="col-md-6 mx-2 my-3">
				           <input type="text" class="form-control" name="padroeiro_grupo" id="padroeiro_grupo" placeholder="Padroeiro(a) do Grupo" value="<?php
				            if (isset($dados['padroeiro_grupo'])) {
				                echo $dados['padroeiro_grupo'];
				            } elseif (isset($row_usuario['padroeiro_grupo'])) {
				                echo $row_usuario['padroeiro_grupo'];
				            }
				            ?>" >
			            </div>


			            <div class="col-md-6 mx-2 my-3">
			                <label for="validationTooltip01 mx-2">Imagem</label>
			            </div>

			            <div class="col-md-6 mx-2">
			            <input type="file" class="custom-file-input" name="arquivo" id="validatedCustomFile" required>
			                <label class="custom-file-label" for="validatedCustomFile"></label>
			                <div class="invalid-feedback">Ficheiro Invalido</div>
			            </div>

			            <div class="col-md-6 mx-2 my-3">
			                <label for="validationTooltip01 mx-2">Regulamento</label>
			            </div>

			            <div class="col-md-6 mx-2">
			            <input type="file" class="custom-file-input" name="arquivo_regulamento" id="validatedCustomFile" required>
			                <label class="custom-file-label" for="validatedCustomFile"></label>
			                <div class="invalid-feedback">Ficheiro Invalido</div>

			            </div>
    				</div>
    			</div>
    			<hr>
	            <button type="submit" name="EditUsuario" id="EditUsuario" class="btn btn-primary mx-3 mb-4" value="registar">Alterar</button>
	            <button type="submit" id="btCancelar" class="btn btn-danger mx-3 mb-4">Cancelar</button>
    		</fieldset>
		</form>
   