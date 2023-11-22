
<?php
    include_once 'menu.php';
    ?>


	<!-- Formulario de registro de Membros -->
<div class="container">

	<div class="row my-2">
		<div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_membros.php" class="btn btn-primary">Registar Membro</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_membros_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
 	<hr>

	<div class="row ">
		<?php 
		$dados = listarPDOmembro(); 
		$d = new ArrayIterator($dados);?>

		<!-- Exclusao de dados da base de dados -->
		<?php
			try{
				if(isset($_GET['ac'])){
					if($_GET['ac'] == 'del'){
						$id_membro = filter_input(INPUT_GET, 'id_membro', FILTER_SANITIZE_NUMBER_INT);
						$id_membro = filter_var($id_membro, FILTER_VALIDATE_INT);
						if($id_membro){
							if(deletarPDOmembro($id_membro)){
								echo "<script>alert(' Membro deletado com sucesso');window.location.href='listar_membros.php';</script>";
							}else{
								throw new Exception('Erro ao deletar Membro');
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
          <h1>Lista dos Membros</h1> 
        </div>

		<?php while($d->valid()){?>
			
			<div class="card mx-3 my-5">
				<div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="Imagem_membro/<?=$d->current()->foto_membro?>" alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                      <h4><i class="fa fa-user"></i>   <?php echo $d->current()->nome_membro. "<br />"; ?></h4>
                      <?php 
						$dadosa = pegarPeloIDComPDOgrupo($d->current()->id_grupo); 
						$dc = new ArrayIterator($dadosa);
						if($dc->current()->nome_grupo){
					 ?>
                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $dc->current()->nome_grupo. "<br />"; ?><?php }?></p>
                      <p class="text-muted font-size-sm"><i class="ni ni-pin-3"></i>   <?php echo $d->current()->endereco_membro. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $d->current()->telefone_membro. "<br />"; ?></p>
                      <button class="btn btn-secundary"><a href="ver_membro.php?idMembro=<?php echo $d->current()->id_membro;?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="?id_membro=<?php echo $d->current()->id_membro;?>&ac=del" class="card-link card-danger">Excluir</a></button>
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
