
<?php
    include_once 'menu.php';
    ?>


	<!-- Listagem de Grupos -->
<div class="container">
	
	<div class="row my-2">
        <div class="col d-flex flex-column align-items-center text-center">
          <a href="registar_patrimonio.php" class="btn btn-primary">Registar Patrimonio</a> 
        </div>

        <div class="col d-flex flex-column align-items-center text-center">
          <a href="listar_patrimonio_tabela.php" class="btn btn-primary">Listar por tabela</a> 
        </div>
    </div>
    <hr>
	<div class="row ">
		<?php 
		$dados = listarPDOpatrimonio(); 
		$d = new ArrayIterator($dados);
		
		$gr = array($d->current()->id_patrimonio);
		$contarGrupo = array_pop($gr);
		//echo $contarGrupo;

		/* CONTAGEM DE REGISTO...
			$pdo = conectarPDO();
			$listar = $pdo->query('SELECT * FROM grupo ORDER BY grupo.id_grupo DESC');
			$listar->execute();
			echo $listar->rowCount();
		*/

		?>

		<div class="col-sm-12 d-flex flex-column align-items-center text-center my-2">
          <h1>Lista dos Patrimonios</h1> 
        </div>


		<?php while($d->valid()){?>

			<div class="card mx-3 my-5">
				<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="Imagem_patrimonio/Patrimonio.png". alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                    	
                      <h4><i class="fa fa-object-group"></i>   <?php echo $d->current()->descrisao_patrimonio. "<br />"; ?></h4>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->local_patrimonio. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->quantidade_patrimonio. "<br />"; ?></p>
                      <p class="text-muted font-size-sm"><i class="fa fa-object-group"></i>   <?php echo $d->current()->observacao_patrimonio. "<br />"; ?></p>
                      <button class="btn btn-outline-danger"><a href="#">Alterar Dados</a></button>
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



