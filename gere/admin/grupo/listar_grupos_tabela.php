
<?php
	include_once 'menu.php';
?>
	<!-- Listagem de Grupos -->
<div class="container">
	<div class="row ">
		
		<!-- Criaçao da Tabela de listagem com dados da base de dados -->
		<div class="mycontent-left mb-5">
			<table class="table table-dark md-3"> 
				<?php 
				$dados = listarPDOgrupo(); 
				$d = new ArrayIterator($dados);?>

				<!-- Exclusao de dados da base de dados -->
				<?php
					try{
						if(isset($_GET['ac'])){
							if($_GET['ac'] == 'del'){
								$id_grupo = filter_input(INPUT_GET, 'id_grupo', FILTER_SANITIZE_NUMBER_INT);
								$id_grupo = filter_var($id_grupo, FILTER_VALIDATE_INT);
								if($id_grupo){
									if(deletarPDOgrupo($id_grupo)){
										echo "<script>alert(' Grupo deletado com sucesso');window.location.href='registar_grupos.php';</script>";
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

				<h2>Lista dos Grupos</h2> 
				
				<thead> 
					<tr> 
						<th>Imagem</th>
						<th>ID</th>
						<th>Nome</th> 
						<th>Comissão</th> 
						<th>Carisma</th> 
						<th>Fundação</th>
						<th>Padroeiro</th> 
						<th>Tipo</th>
						<th>Regulamento</th>
						<th>Ver detalhes</th>
						<th>Excluir</th>
					</tr> 
				</thead> 

				<?php while($d->valid()){?>

				<tbody> 
					<tr> 
						
						<td>
							<span class="avatar avatar rounded-circle">
		                    	<img alt="Image placeholder" src="Imagem_grupo/<?=$d->current()->imagem_grupo?>".>
		                 	</span>
						</td>
						<td><?php echo $d->current()->id_grupo. "<br />"; ?></td> 
						
						<td><?php echo $d->current()->nome_grupo. "<br />"; ?></td>
						<?php 
							$dadosa = pegarPeloIDComPDOcomissao($d->current()->id_comissao); 
							$dc = new ArrayIterator($dadosa);
							if($dc->current()->nome_comissao){
						 ?>
	                    <td><?php echo $dc->current()->nome_comissao. "<br />"; ?><?php }?></td>
						<td><?php echo $d->current()->carisma_grupo. "<br />"; ?></td>
						<td><?php echo $d->current()->fundacao_grupo. "<br />"; ?></td>
						<td><?php echo $d->current()->padroeiro_grupo. "<br />"; ?></td>

						<?php 
						$dadosa = pegarPeloIDComPDOtipogrupo($d->current()->id_tipo_grupo); 
						$dc = new ArrayIterator($dadosa);
						if($dc->current()->nome_tipo_grupo){
					 ?>
                      
						<td><?php echo $dc->current()->nome_tipo_grupo. "<br />"; ?><?php }?></td>
						<td><?php echo $d->current()->regulamento_grupo. "<br />"; ?></td>
						<td><a href="ver_grupo.php?idGrupo=<?php echo $d->current()->id_grupo;?>">Ver detalhes</a></td></td>
						<td><a href="?id_grupo=<?php echo $d->current()->id_grupo;?>&ac=del">Excluir Dados</a></td>
						
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

