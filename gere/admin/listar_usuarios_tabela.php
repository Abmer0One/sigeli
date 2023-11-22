
<?php
	include_once 'menu.php';
?>
	<!-- Listagem de Usuarios -->
<div class="container">
	<div class="row ">
		
		<!-- Criaçao da Tabela de listagem com dados da base de dados -->
		<div class="mycontent-left mb-5">
			<table class="table table-dark md-3"> 
				<?php 
				$dados = listarPDOusuario(); 
				$d = new ArrayIterator($dados);?>

				<!-- Exclusao de dados da base de dados -->
				<?php
					try{
						if(isset($_GET['ac'])){
							if($_GET['ac'] == 'del'){
								$usuario_id = filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_NUMBER_INT);
								$usuario_id = filter_var($usuario_id, FILTER_VALIDATE_INT);
								if($usuario_id){
									if(deletarPDOgrupo($usuario_id)){
										echo "<script>alert(' Usuario deletado com sucesso');window.location.href='registar_usuario.php';</script>";
									}else{
										throw new Exception('Erro ao deletar Usuario');
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

				<h2>Lista dos Usuarios</h2> 
				
				<thead> 
					<tr> 
						<th>Imagem</th>
						<th>Nome</th> 
						<th>Sobrenome</th> 
						<th>Nivel</th> 
						<th>Tipo de Nivel</th>
						<th>Estado</th> 
						<th>Ver detalhes</th>
						<th>Excluir</th>
					</tr> 
				</thead> 

				<?php while($d->valid()){?>

				<tbody> 
					<tr> 
						
						<td>
							<span class="avatar avatar rounded-circle">
		                    	<img alt="Image placeholder" src="Imagem_usuario/<?=$d->current()->foto?>".>
		                 	</span>
						</td>
						
						
						<td><?php echo $d->current()->nome. "<br />"; ?></td>
					
						<td><?php echo $d->current()->sobrenome. "<br />"; ?></td>
						<td><?php echo $d->current()->nivel. "<br />"; ?></td>
						<td><?php echo $d->current()->tipo_nivel. "<br />"; ?></td>

						
						<td><?php echo $d->current()->estado. "<br />"; ?></td>
						<td><a href="ver_usuario.php?idUsuario=<?php echo $d->current()->usuario_id;?>">Ver detalhes</a></td></td>
						<td><a href="?usuario_id=<?php echo $d->current()->usuario_id;?>&ac=del">Excluir Dados</a></td>
						
					</tr> 
					<?php
					$d->next();
					}?>
				</tbody> 
			</table>
		</div>
		
	</div>
	<!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>
</div>

