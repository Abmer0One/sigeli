<?php
include_once 'menu.php';
ob_start();

$id_comissao = filter_input(INPUT_GET, "id_comissao", FILTER_SANITIZE_NUMBER_INT);

if (empty($id_comissao)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    exit();
}

$query_usuario = "SELECT id_comissao, nome_comissao, regulamento_comissao, detalhes_comissao, imagem_comissao FROM comissao WHERE id_comissao = $id_comissao LIMIT 1";

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
                $regulamento_comissao =$dados['nome_comissao'].".".$extensao_r;
                $diretorior = "Regulamento_comissao/";
                if(!is_dir($diretorior))
                    mkdir($diretorior);
                move_uploaded_file($_FILES['arquivo_regulamento']['tmp_name'], $diretorior . $regulamento_comissao);
            }


            if(isset($_FILES['arquivo'])){
                $arquivo = $_FILES['arquivo']['name'];
                $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
                $imagem_comissao = $dados['nome_comissao'].".".$extensao;
                $diretorio = "Imagem_comissao/";
                if(!is_dir($diretorio))
                    mkdir($diretorio);
                move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $imagem_comissao);
            }

            

            $empty_input = false;
            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
            } 

            if (!$empty_input) { //tamanhoArtigo, imagem_artigo, idFornecedor, cor, idInstituicao, idFaculdade, quantidade...
                $query_up_usuario= "UPDATE comissao SET nome_comissao=:nome_comissao, regulamento_comissao=:regulamento_comissao, detalhes_comissao=:detalhes_comissao, imagem_comissao=:imagem_comissao WHERE id_comissao=:id_comissao";
                $pdo = conectarPDO();
                $edit_usuario = $pdo->prepare($query_up_usuario);
                $edit_usuario->bindParam(':nome_comissao', $dados['nome_comissao'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':regulamento_comissao', $regulamento_comissao, PDO::PARAM_STR);
                $edit_usuario->bindParam(':detalhes_comissao', $dados['detalhes_comissao'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':imagem_comissao', $imagem_comissao, PDO::PARAM_STR);
                $edit_usuario->bindParam(':id_comissao', $id_comissao, PDO::PARAM_INT);
                if($edit_usuario->execute()){
                    echo "Comissão alterada com sucesso...";
                    echo "<script>alert('Alteração feita com sucesso');window.location.href='listar_comissoes.php';</script>";
                }else{
                    echo "Comissão não alterada com sucesso...";
                    echo "<script>alert('Alteração não feita com sucesso');window.location.href='listar_comissoes.php';</script>";
                }
            }
        }
        ?>

        <form id="edit-usuario" method="POST" enctype="multipart/form-data">
            <fieldset>
                    <div class="fieldset mx-2">
                        <legend class="legend mx-2 mb-2">Alterar os Dados da Comissão</legend>
                            <div class="form-row">

            

            <div class="col-md-4 mx-2 my-3">
            <input type="text" class="form-control" name="nome_comissao" id="nome_comissao" placeholder="Nome da Comissão" value="<?php
            if (isset($dados['nome_comissao'])) {
                echo $dados['nome_comissao'];
            } elseif (isset($row_usuario['nome_comissao'])) {
                echo $row_usuario['nome_comissao'];
            }
            ?>" >
            </div>
           
           <div class="col-md-4 mx-2 my-3">
           <input type="text" class="form-control" name="detalhes_comissao" id="detalhes_comissao" placeholder="Detalhes da Comissão" value="<?php
            if (isset($dados['detalhes_comissao'])) {
                echo $dados['detalhes_comissao'];
            } elseif (isset($row_usuario['detalhes_comissao'])) {
                echo $row_usuario['detalhes_comissao'];
            }
            ?>" >
            </div>

            <div class="col-md-4 mx-2 my-3">
                <label for="validationTooltip01 mx-2">Imagem</label>
            </div>

            <div class="col-md-4 mx-2">
            <input type="file" class="custom-file-input" name="arquivo" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile"></label>
                <div class="invalid-feedback">Ficheiro Invalido</div>
            </div>

            <div class="col-md-4 mx-2 my-3">
                <label for="validationTooltip01 mx-2">Regulamento</label>
            </div>

            <div class="col-md-4 mx-2">
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
   
