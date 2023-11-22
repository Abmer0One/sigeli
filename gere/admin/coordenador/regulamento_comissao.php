<?php
    include_once 'menu.php';
    ?>

    <!-- Recebe os dados de ver grupo -->
		<?php 
			$ComissaoRegulamento = $_GET['regulamentoComissao'];
		?>

		<embed src="Regulamento_comissao/<?=$ComissaoRegulamento?>" type="application/pdf" width="100%" height="600" style="border: none;"></embed>

    <!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>