
<?php
    include_once 'menu.php';
    ?>


	<!-- Formulario de registro de Membros -->
<div class="container">
	
	<div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_coordenador.php" class="btn btn-primary">Registar Coordenador</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_coordenadores_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<div class="row ">
		<?php 
		$dados = listarPDOcoordenador(); 
		$d = new ArrayIterator($dados);?>

		<!-- Exclusao de dados da base de dados -->
		<?php
			try{
				if(isset($_GET['ac'])){
					if($_GET['ac'] == 'del'){
						$id_coordenador = filter_input(INPUT_GET, 'id_coordenador', FILTER_SANITIZE_NUMBER_INT);
						$id_coordenador = filter_var($id_coordenador, FILTER_VALIDATE_INT);
						if($id_coordenador){
							if(deletarPDOcoordenador($id_coordenador)){
								echo "<script>alert(' Coordenador deletado com sucesso');window.location.href='listar_coordenadores.php';</script>";
							}else{
								throw new Exception('Erro ao deletar Coordenador');
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
          <h1>Lista dos Coordenadores</h1> 
        </div>


		<?php while($d->valid()){?>
			
			<div class="card mx-3 my-5">
				<div class="card-body">
				<?php 
					$dados_m = pegarPeloIDComPDOmembro($d->current()->membro_coordenador_id); 
					$d_m = new ArrayIterator($dados_m);?>
					<?php while($d_m->valid()){?>
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="Imagem_membro/<?=$d_m->current()->foto_membro?>" alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-user"></i>   <?php echo $d_m->current()->nome_membro. "<br/>"; ?><?php $d_m->next(); }?></h4>


                      <?php 
								$dados_g = pegarPeloIDComPDOgrupo($d->current()->grupo_coordenador_id); 
								$d_g = new ArrayIterator($dados_g);?>
								<?php while($d_g->valid()){?>
								
                      <p class="text-primary mb-1"><i class="fa fa-users"></i>   <?php echo $d_g->current()->nome_grupo. "<br/>"; ?><?php $d_g->next(); }?></p>

                      <p class="text-muted font-size-sm"><i class="ni ni-pin-3"></i>   <?php echo $d->current()->cargo_coordenador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $d->current()->descricao_cargo_coordenador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <?php echo $d->current()->data_inicio_coordenador. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-phone"></i>   <td><?php echo $d->current()->data_fim_coordenador. "<br />"; ?></p>
                      <button class="btn btn-secundary"><a href="ver_membro.php?idMembro=<?php echo $d->current()->id_membro;?>" class="card-link">Ver Detalhes</a></button>
                      <button class="btn btn-outline-danger"><a href="?id_coordenador=<?php echo $d->current()->id_coordenador;?>&ac=del">Excluir Dados</a></button>
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

