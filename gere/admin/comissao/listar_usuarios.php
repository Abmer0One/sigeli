
<?php
    include_once 'menu.php';
    ?>


	<!-- Listagem de Grupos -->
<div class="container">
	
	<div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_usuario.php" class="btn btn-primary">Registar Usuário</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_grupos_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<div class="row ">
		<?php 
		$dados = listarPDOusuario(); 
		$d = new ArrayIterator($dados);
		
		$gr = array($d->current()->usuario_id);
		$contarGrupo = array_pop($gr);
		//echo $contarGrupo;

		/* CONTAGEM DE REGISTO...
			$pdo = conectarPDO();
			$listar = $pdo->query('SELECT * FROM grupo ORDER BY grupo.id_grupo DESC');
			$listar->execute();
			echo $listar->rowCount();
		*/

		?>

		<!-- Exclusao de dados da base de dados -->
		<?php
			try{
				if(isset($_GET['ac'])){
					if($_GET['ac'] == 'del'){
						$usuario_id = filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_NUMBER_INT);
						$usuario_id = filter_var($usuario_id, FILTER_VALIDATE_INT);
						if($usuario_id){
							if(deletarPDOgrupo($usuario_id)){
								echo "<script>alert(' Grupo deletado com sucesso');window.location.href='listar_grupos.php';</script>";
							}else{
								throw new Exception('Erro ao deletar Grupo');
							}
						}else{
							throw new Exception('É necessario pasar um ID valido !');
						}
					}
				}
			}catch(Exception $e){
				echo "Erro: ".$e->getMessage();
			}
		?>

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Lista dos Usuários</h1> 
        </div>


		<?php while($d->valid()){?>

			<div class="card mx-3 my-5">
				<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="Imagem_usuario/<?=$d->current()->foto?>". alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-users"></i>   <?php echo $d->current()->nome. "<br />"; ?></h4>
                      

                      <p class="text-muted font-size-sm"><i class="fa fa-heart"></i>   <?php echo $d->current()->sobrenome. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-birthday-cake"></i>   <?php echo $d->current()->nivel. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-user"></i>   <?php echo $d->current()->tipo_nivel. "<br />"; ?></p>
                     
                      <button class="btn btn-secundary"><a href="ver_grupo.php?idUsuario=<?php echo $d->current()->usuario_id;?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="?id_grupo=<?php echo $d->current()->usuario_id;?>&ac=del">Excluir Dados</a></button>
                    </div>
                  </div>
                </div>
            </div>
			<?php
			$d->next();
			}?>	
		</div>
	</div>
	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>



