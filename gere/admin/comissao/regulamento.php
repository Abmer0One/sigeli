<?php
    include_once 'menu.php';
    ?>

    <!-- Recebe os dados de ver grupo -->
		<?php 
			$GrupoRegulamento = $_GET['regulamentoGrupo'];
		?>

		<embed src="Regulamento_grupo/<?=$GrupoRegulamento?>" type="application/pdf" width="100%" height="600" style="border: none;"></embed>

    <!-- Footer -->
      <?php
        include_once 'rodape.php';
      ?>