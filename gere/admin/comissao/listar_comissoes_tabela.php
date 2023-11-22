
<?php
	include_once 'menu.php';
?>
	<!-- Listagem de Comissões -->
<div class="container">
	<div class="row ">
		
		<!-- Criaçao da Tabela de listagem com dados da base de dados -->
		<div class="mycontent-left mb-5">
			<table class="table table-dark md-3"> 
				<?php 
				$dados = listarPDOcomissao(); 
				$d = new ArrayIterator($dados);?>

				<!-- Exclusao de dados da base de dados -->
				<?php
					try{
						if(isset($_GET['ac'])){
							if($_GET['ac'] == 'del'){
								$id_comissao = filter_input(INPUT_GET, 'id_comissao', FILTER_SANITIZE_NUMBER_INT);
								$id_comissao = filter_var($id_comissao, FILTER_VALIDATE_INT);
								if($id_comissao){
									if(deletarPDOcomissao($id_comissao)){
										echo "<script>alert(' Comissão deletado com sucesso');window.location.href='registar_comissao.php';</script>";
									}else{
										throw new Exception('Erro ao deletar Comissão');
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
						<th>Detalhes</th>
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
		                    	<img alt="Image placeholder" src="Imagem_comissao/<?=$d->current()->imagem_comissao?>".>
		                 	</span>
						</td>
						<td><?php echo $d->current()->id_comissao. "<br />"; ?></td> 
						<td><?php echo $d->current()->nome_comissao. "<br />"; ?></td>
						<td><?php echo $d->current()->detalhes_comissao. "<br />"; ?></td>
						<td><?php echo $d->current()->regulamento_comissao. "<br />"; ?></td>
						<td><a href="ver_comissao.php?idComissao=<?php echo $d->current()->id_comissao;?>&nomeComissao=<?php echo $d->current()->nome_comissao;?>&detalheComissao=<?php echo $d->current()->detalhes_comissao;?>&regulamentoComissao=<?php echo $d->current()->regulamento_comissao;?>&fotoComissao=<?php echo $d->current()->imagem_comissao?>">Ver detalhes</a></td></td>
						<td><a href="?id_comissao=<?php echo $d->current()->id_comissao;?>&ac=del">Excluir Dados</a></td>
						
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

