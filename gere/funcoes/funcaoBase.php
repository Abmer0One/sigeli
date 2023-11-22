<!-- Funções CRUD, Autenticação e Login -->
<?php

//Funçao cadastrar Usuario com PDO...
function cadastrarPDOusuario($nome, $sobrenome, $username, $senha, $nivel, $tipo_nivel, $estado, $foto){
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO usuario(nome, sobrenome, username, senha, nivel, tipo_nivel, estado, foto) 
	VALUES (:nome, :sobrenome, :username, :senha, :nivel, :tipo_nivel, :estado, :foto)");
	

	$cadastrar->bindValue("nome", $nome, PDO::PARAM_STR);
	$cadastrar->bindValue("sobrenome", $sobrenome, PDO::PARAM_STR);
	$cadastrar->bindValue("username", $username, PDO::PARAM_STR);
	$cadastrar->bindValue("senha", $senha, PDO::PARAM_STR);
	$cadastrar->bindValue("nivel", $nivel, PDO::PARAM_STR);
	$cadastrar->bindValue("tipo_nivel", $tipo_nivel, PDO::PARAM_STR);
	$cadastrar->bindValue("estado", $estado, PDO::PARAM_STR);
	$cadastrar->bindValue("foto", $foto, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}

//Funçao cadastrar Coordenador com PDO...
function cadastrarPDOcoordenador($grupo_coordenador_id, $cargo_coordenador, $descricao_cargo_coordenador, $membro_coordenador_id, $data_inicio_coordenador, $data_fim_coordenador){
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO coordenador(grupo_coordenador_id, cargo_coordenador, descricao_cargo_coordenador, membro_coordenador_id, data_inicio_coordenador, data_fim_coordenador) 
	VALUES (:grupo_coordenador_id, :cargo_coordenador, :descricao_cargo_coordenador, :membro_coordenador_id, :data_inicio_coordenador, :data_fim_coordenador)");
	

	$cadastrar->bindValue("grupo_coordenador_id", $grupo_coordenador_id, PDO::PARAM_INT);
	$cadastrar->bindValue("cargo_coordenador", $cargo_coordenador, PDO::PARAM_STR);
	$cadastrar->bindValue("descricao_cargo_coordenador", $descricao_cargo_coordenador, PDO::PARAM_STR);
	$cadastrar->bindValue("membro_coordenador_id", $membro_coordenador_id, PDO::PARAM_INT);
	$cadastrar->bindValue("data_inicio_coordenador", $data_inicio_coordenador, PDO::PARAM_STR);
	$cadastrar->bindValue("data_fim_coordenador", $data_fim_coordenador, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}



//Funçao cadastrar Comissão com PDO...
function cadastrarPDOcomissao($nome_comissao, $detalhes_comissao, $regulamento_comissao, $imagem_comissao){
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO comissao(nome_comissao, detalhes_comissao, regulamento_comissao, imagem_comissao) 
	VALUES (:nome_comissao, :detalhes_comissao, :regulamento_comissao, :imagem_comissao)");

	$cadastrar->bindValue("nome_comissao", $nome_comissao, PDO::PARAM_STR);
	$cadastrar->bindValue("detalhes_comissao", $detalhes_comissao, PDO::PARAM_STR);
	$cadastrar->bindValue("regulamento_comissao", $regulamento_comissao, PDO::PARAM_STR);
	$cadastrar->bindValue("imagem_comissao", $imagem_comissao, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}

//Funçao cadastrar Grupo com PDO...
function cadastrarPDOgrupo($nome_grupo, $carisma_grupo, $imagem_grupo, $regulamento_grupo, $fundacao_grupo, $padroeiro_grupo, $id_tipo_grupo, $quantidade_membros_grupo, $id_comissao){
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO grupo(nome_grupo, carisma_grupo, imagem_grupo, regulamento_grupo, fundacao_grupo, padroeiro_grupo, id_tipo_grupo, quantidade_membros_grupo, id_comissao) 
	VALUES (:nome_grupo, :carisma_grupo, :imagem_grupo, :regulamento_grupo, :fundacao_grupo, :padroeiro_grupo, :id_tipo_grupo, :quantidade_membros_grupo, :id_comissao)");

	$cadastrar->bindValue("nome_grupo", $nome_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("carisma_grupo", $carisma_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("imagem_grupo", $imagem_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("regulamento_grupo", $regulamento_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("fundacao_grupo", $fundacao_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("padroeiro_grupo", $padroeiro_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("id_tipo_grupo", $id_tipo_grupo, PDO::PARAM_INT);
	$cadastrar->bindValue("quantidade_membros_grupo", $quantidade_membros_grupo, PDO::PARAM_INT);
	$cadastrar->bindValue("id_comissao", $id_comissao, PDO::PARAM_INT);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}

 
//Funçao cadastrar Membro com PDO...
function cadastrarPDOmembro($nome_membro, $id_grupo, $data_nascimento_membro, $telefone_membro, $email_membro, $endereco_membro, $foto_membro, $foto_sacramento_baptismo, $foto_sacramento_confirmacao, $foto_sacramento_matrimonio, $data_sacramento_baptismo, $data_sacramento_confirmacao, $data_sacramento_matrimonio, $paroquia_sacramento_baptismo, $paroquia_sacramento_confirmacao, $paroquia_sacramento_matrimonio, $data_inicio_membro, $data_fim_membro){
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO membro(nome_membro, id_grupo, data_nascimento_membro, telefone_membro, email_membro, endereco_membro, foto_membro, foto_sacramento_baptismo, foto_sacramento_confirmacao, foto_sacramento_matrimonio, data_sacramento_baptismo, data_sacramento_confirmacao, data_sacramento_matrimonio, paroquia_sacramento_baptismo, paroquia_sacramento_confirmacao, paroquia_sacramento_matrimonio, data_inicio_membro, data_fim_membro) 
	VALUES (:nome_membro, :id_grupo, :data_nascimento_membro, :telefone_membro, :email_membro, :endereco_membro, :foto_membro, :foto_sacramento_baptismo, :foto_sacramento_confirmacao, :foto_sacramento_matrimonio, :data_sacramento_baptismo, :data_sacramento_confirmacao, :data_sacramento_matrimonio, :paroquia_sacramento_baptismo, :paroquia_sacramento_confirmacao, :paroquia_sacramento_matrimonio, :data_inicio_membro, :data_fim_membro)");
	
	$cadastrar->bindValue("nome_membro", $nome_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("id_grupo", $id_grupo, PDO::PARAM_INT);
	$cadastrar->bindValue("data_nascimento_membro", $data_nascimento_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("telefone_membro", $telefone_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("email_membro", $email_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("endereco_membro", $endereco_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("foto_membro", $foto_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("foto_sacramento_baptismo", $foto_sacramento_baptismo, PDO::PARAM_STR);
	$cadastrar->bindValue("foto_sacramento_confirmacao", $foto_sacramento_confirmacao, PDO::PARAM_STR);
	$cadastrar->bindValue("foto_sacramento_matrimonio", $foto_sacramento_matrimonio, PDO::PARAM_STR);
	$cadastrar->bindValue("data_sacramento_baptismo", $data_sacramento_baptismo, PDO::PARAM_STR);
	$cadastrar->bindValue("data_sacramento_confirmacao", $data_sacramento_confirmacao, PDO::PARAM_STR);
	$cadastrar->bindValue("data_sacramento_matrimonio", $data_sacramento_matrimonio, PDO::PARAM_STR);
	$cadastrar->bindValue("paroquia_sacramento_baptismo", $paroquia_sacramento_baptismo, PDO::PARAM_STR);
	$cadastrar->bindValue("paroquia_sacramento_confirmacao", $paroquia_sacramento_confirmacao, PDO::PARAM_STR);
	$cadastrar->bindValue("paroquia_sacramento_matrimonio", $paroquia_sacramento_matrimonio, PDO::PARAM_STR);
	$cadastrar->bindValue("data_inicio_membro", $data_inicio_membro, PDO::PARAM_STR);
	$cadastrar->bindValue("data_fim_membro", $data_fim_membro, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Grupo com PDO...
function cadastrarPDOtipogrupo($nome_tipo_grupo, $id_comissao){
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO tipogrupo(nome_tipo_grupo, id_comissao) 
	VALUES (:nome_tipo_grupo, :id_comissao)");

	$cadastrar->bindValue("nome_tipo_grupo", $nome_tipo_grupo, PDO::PARAM_STR);
	$cadastrar->bindValue("id_comissao", $id_comissao, PDO::PARAM_INT);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}



//Funçao cadastrar Tempo Liturgico com PDO...
function cadastrarPDOtempoLiturgico($descrisao_tempo_liturgico, $descrisao_nome_tempo ,$descrisao_ano_tempo){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO tempo_liturgico(descrisao_tempo_liturgico, descrisao_nome_tempo, descrisao_ano_tempo) 
	VALUES (:descrisao_tempo_liturgico, :descrisao_nome_tempo, :descrisao_ano_tempo)");

	$cadastrar->bindValue("descrisao_tempo_liturgico", $descrisao_tempo_liturgico, PDO::PARAM_STR);
	$cadastrar->bindValue("descrisao_nome_tempo", $descrisao_nome_tempo, PDO::PARAM_STR);
	$cadastrar->bindValue("descrisao_ano_tempo", $descrisao_ano_tempo, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}

//Funçao cadastrar Patrimonio com PDO...
function cadastrarPDOpatrimonio($descrisao_patrimonio, $local_patrimonio, $quantidade_patrimonio, $observacao_patrimonio){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO patrimonio(descrisao_patrimonio, local_patrimonio, quantidade_patrimonio, observacao_patrimonio) 
	VALUES (:descrisao_patrimonio, :local_patrimonio, :quantidade_patrimonio, :observacao_patrimonio)");

	$cadastrar->bindValue("descrisao_patrimonio", $descrisao_patrimonio, PDO::PARAM_STR);
	$cadastrar->bindValue("local_patrimonio", $local_patrimonio, PDO::PARAM_STR);
	$cadastrar->bindValue("quantidade_patrimonio", $quantidade_patrimonio, PDO::PARAM_STR);
	$cadastrar->bindValue("observacao_patrimonio", $observacao_patrimonio, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Emprestimo com PDO...
function cadastrarPDOemprestimo($material_emprestimo, $quantidade_emprestimo, $responsavel_emprestimo, $data_emprestimo, $data_entrega, $observacao_emprestimo){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO emprestimo(material_emprestimo, quantidade_emprestimo, responsavel_emprestimo, data_emprestimo, data_entrega, observacao_emprestimo) 
	VALUES (:material_emprestimo, :quantidade_emprestimo, :responsavel_emprestimo, :data_emprestimo, :data_entrega, :observacao_emprestimo)");

	$cadastrar->bindValue("material_emprestimo", $material_emprestimo, PDO::PARAM_STR);
	$cadastrar->bindValue("quantidade_emprestimo", $quantidade_emprestimo, PDO::PARAM_INT);
	$cadastrar->bindValue("responsavel_emprestimo", $responsavel_emprestimo, PDO::PARAM_STR);
	$cadastrar->bindValue("data_emprestimo", $data_emprestimo, PDO::PARAM_STR);
	$cadastrar->bindValue("data_entrega", $data_entrega, PDO::PARAM_STR);
	$cadastrar->bindValue("observacao_emprestimo", $observacao_emprestimo, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Reserva com PDO...
function cadastrarPDOreserva($material_reserva, $reservador, $tipo_de_actividade, $data_reserva, $hora_reserva){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO reserva(material_reserva, reservador, tipo_de_actividade, data_reserva, hora_reserva) 
	VALUES (:material_reserva, :reservador, :tipo_de_actividade, :data_reserva, :hora_reserva)");

	$cadastrar->bindValue("material_reserva", $material_reserva, PDO::PARAM_STR);
	$cadastrar->bindValue("reservador", $reservador, PDO::PARAM_STR);
	$cadastrar->bindValue("tipo_de_actividade", $tipo_de_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("data_reserva", $data_reserva, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_reserva", $hora_reserva, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Doação com PDO...
function cadastrarPDOdoacao($descrisao_doacao, $quantidade_doacao, $doador, $data_doacao, $observacao_doacao){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO doacao(descrisao_doacao, quantidade_doacao, doador, data_doacao, observacao_doacao) 
	VALUES (:descrisao_doacao, :quantidade_doacao, :doador, :data_doacao, :observacao_doacao)");

	$cadastrar->bindValue("descrisao_doacao", $descrisao_doacao, PDO::PARAM_STR);
	$cadastrar->bindValue("quantidade_doacao", $quantidade_doacao, PDO::PARAM_INT);
	$cadastrar->bindValue("doador", $doador, PDO::PARAM_STR);
	$cadastrar->bindValue("data_doacao", $data_doacao, PDO::PARAM_STR);
	$cadastrar->bindValue("observacao_doacao", $observacao_doacao, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Necessitado com PDO...
function cadastrarPDOnecessitado($nome_necessitado, $morada_necessitado, $telefone_necessitado, $estado_necessitado, $idade_necessitado, $observacao_necessitado){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO necessitado(nome_necessitado, morada_necessitado, telefone_necessitado, estado_necessitado, idade_necessitado, observacao_necessitado) 
	VALUES (:nome_necessitado, :morada_necessitado, :telefone_necessitado, :estado_necessitado, :idade_necessitado, :observacao_necessitado)");

	$cadastrar->bindValue("nome_necessitado", $nome_necessitado, PDO::PARAM_STR);
	$cadastrar->bindValue("morada_necessitado", $morada_necessitado, PDO::PARAM_STR);
	$cadastrar->bindValue("telefone_necessitado", $telefone_necessitado, PDO::PARAM_STR);
	$cadastrar->bindValue("estado_necessitado", $estado_necessitado, PDO::PARAM_STR);
	$cadastrar->bindValue("idade_necessitado", $idade_necessitado, PDO::PARAM_INT);
	$cadastrar->bindValue("observacao_necessitado", $observacao_necessitado, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}



//Funçao cadastrar Doador com PDO...
function cadastrarPDOdoador($nome_doador, $telefone_doador, $morada_doador, $estado_doador, $observacao_doador){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO doador(nome_doador, telefone_doador, morada_doador, estado_doador, observacao_doador) 
	VALUES (:nome_doador, :telefone_doador, :morada_doador, :estado_doador, :observacao_doador)");

	$cadastrar->bindValue("nome_doador", $nome_doador, PDO::PARAM_STR);
	$cadastrar->bindValue("telefone_doador", $telefone_doador, PDO::PARAM_STR);
	$cadastrar->bindValue("morada_doador", $morada_doador, PDO::PARAM_STR);
	$cadastrar->bindValue("estado_doador", $estado_doador, PDO::PARAM_STR);
	$cadastrar->bindValue("observacao_doador", $observacao_doador, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Leituras com PDO...
function cadastrarPDOleituras($data_leitura, $tempo_liturgico ,$titulo_primeira_leitura, $primeira_leitura, $titulo_segunda_leitura, $segunda_leitura, $titulo_salmo, $salmo_responsorial, $titulo_preces, $oracao_dos_fieis, $titulo_evangelho, $evangelho){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO leituras(data_leitura, tempo_liturgico ,titulo_primeira_leitura, primeira_leitura, titulo_segunda_leitura, segunda_leitura, titulo_salmo, salmo_responsorial, titulo_preces, oracao_dos_fieis, titulo_evangelho, evangelho) 
	VALUES (:data_leitura, :tempo_liturgico, :titulo_primeira_leitura, :primeira_leitura, :titulo_segunda_leitura, :segunda_leitura, :titulo_salmo, :salmo_responsorial, :titulo_preces, :oracao_dos_fieis, :titulo_evangelho, :evangelho)");

	$cadastrar->bindValue("data_leitura", $data_leitura, PDO::PARAM_STR);
	$cadastrar->bindValue("tempo_liturgico", $tempo_liturgico, PDO::PARAM_INT);
	$cadastrar->bindValue("titulo_primeira_leitura", $titulo_primeira_leitura, PDO::PARAM_STR);
	$cadastrar->bindValue("primeira_leitura", $primeira_leitura, PDO::PARAM_STR);
	$cadastrar->bindValue("titulo_segunda_leitura", $titulo_segunda_leitura, PDO::PARAM_STR);
	$cadastrar->bindValue("segunda_leitura", $segunda_leitura, PDO::PARAM_STR);
	$cadastrar->bindValue("titulo_salmo", $titulo_salmo, PDO::PARAM_STR);
	$cadastrar->bindValue("salmo_responsorial", $salmo_responsorial, PDO::PARAM_STR);
	$cadastrar->bindValue("titulo_preces", $titulo_preces, PDO::PARAM_STR);
	$cadastrar->bindValue("oracao_dos_fieis", $oracao_dos_fieis, PDO::PARAM_STR);
	$cadastrar->bindValue("titulo_evangelho", $titulo_evangelho, PDO::PARAM_STR);
	$cadastrar->bindValue("evangelho", $evangelho, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Escala de Animação com PDO...
function cadastrarPDOescalaAnimacao($data_escala_animacao, $dia_escala_animacao ,$hora_escala_animacao, $escala_tempo_liturgico, $grupo_coral_animador){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO escala_animacao(data_escala_animacao, dia_escala_animacao , hora_escala_animacao, escala_tempo_liturgico, grupo_coral_animador) 
	VALUES (:data_escala_animacao, :dia_escala_animacao , :hora_escala_animacao, :escala_tempo_liturgico, :grupo_coral_animador)");

	$cadastrar->bindValue("data_escala_animacao", $data_escala_animacao, PDO::PARAM_STR);
	$cadastrar->bindValue("dia_escala_animacao", $dia_escala_animacao, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_escala_animacao", $hora_escala_animacao, PDO::PARAM_STR);
	$cadastrar->bindValue("escala_tempo_liturgico", $escala_tempo_liturgico, PDO::PARAM_INT);
	$cadastrar->bindValue("grupo_coral_animador", $grupo_coral_animador, PDO::PARAM_INT);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}



//Funçao cadastrar Escala de Proclamadores com PDO...
function cadastrarPDOescalaProclamadores($data_proclamacao, $tempo_liturgico_proclamacao, $dia_proclamacao, $hora_proclamacao, $proclamador_primeira_leitura, $proclamador_salmo_responsorial, $proclamador_segunda_leitura, $proclamador_preces, $monitor){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO escala_proclamador(data_proclamacao, tempo_liturgico_proclamacao, dia_proclamacao, hora_proclamacao, proclamador_primeira_leitura, proclamador_salmo_responsorial, proclamador_segunda_leitura, proclamador_preces, monitor) 
	VALUES (:data_proclamacao, :tempo_liturgico_proclamacao, :dia_proclamacao, :hora_proclamacao, :proclamador_primeira_leitura, :proclamador_salmo_responsorial, :proclamador_segunda_leitura, :proclamador_preces, :monitor)");

	$cadastrar->bindValue("data_proclamacao", $data_proclamacao, PDO::PARAM_STR);
	$cadastrar->bindValue("tempo_liturgico_proclamacao", $tempo_liturgico_proclamacao, PDO::PARAM_INT);
	$cadastrar->bindValue("dia_proclamacao", $dia_proclamacao, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_proclamacao", $hora_proclamacao, PDO::PARAM_STR);
	$cadastrar->bindValue("proclamador_primeira_leitura", $proclamador_primeira_leitura, PDO::PARAM_INT);
	$cadastrar->bindValue("proclamador_salmo_responsorial", $proclamador_salmo_responsorial, PDO::PARAM_INT);
	$cadastrar->bindValue("proclamador_segunda_leitura", $proclamador_segunda_leitura, PDO::PARAM_INT);
	$cadastrar->bindValue("proclamador_preces", $proclamador_preces, PDO::PARAM_INT);
	$cadastrar->bindValue("monitor", $monitor, PDO::PARAM_INT);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Escala de Padres com PDO...
function cadastrarPDOescalaPadres($data_celebracao, $dia_celebracao, $hora_celebracao, $tempo_liturgico_celebracao, $nome_padre_celebracao){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO escala_padre(data_celebracao, dia_celebracao, hora_celebracao, tempo_liturgico_celebracao, nome_padre_celebracao) 
	VALUES (:data_celebracao, :dia_celebracao, :hora_celebracao, :tempo_liturgico_celebracao, :nome_padre_celebracao)");

	$cadastrar->bindValue("data_celebracao", $data_celebracao, PDO::PARAM_STR);
	$cadastrar->bindValue("dia_celebracao", $dia_celebracao, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_celebracao", $hora_celebracao, PDO::PARAM_STR);
	$cadastrar->bindValue("tempo_liturgico_celebracao", $tempo_liturgico_celebracao, PDO::PARAM_INT);
	$cadastrar->bindValue("nome_padre_celebracao", $nome_padre_celebracao, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Escala de Ministros com PDO...
function cadastrarPDOescalaMinistro($data_ministragem, $dia_ministragem, $hora_ministragem, $tempo_liturgico_ministragem, $nome_ministro_eucaristia){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO escala_ministro_eucaristia(data_ministragem, dia_ministragem, hora_ministragem, tempo_liturgico_ministragem, nome_ministro_eucaristia) 
	VALUES (:data_ministragem, :dia_ministragem, :hora_ministragem, :tempo_liturgico_ministragem, :nome_ministro_eucaristia)");

	$cadastrar->bindValue("data_ministragem", $data_ministragem, PDO::PARAM_STR);
	$cadastrar->bindValue("dia_ministragem", $dia_ministragem, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_ministragem", $hora_ministragem, PDO::PARAM_STR);
	$cadastrar->bindValue("tempo_liturgico_ministragem", $tempo_liturgico_ministragem, PDO::PARAM_INT);
	$cadastrar->bindValue("nome_ministro_eucaristia", $nome_ministro_eucaristia, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}



//Funçao cadastrar Escala de Acolhimento com PDO...
function cadastrarPDOescalaAcolhimento($data_acolhimento, $hora_acolhimento ,$dia_acolhimento, $tempo_liturgico_acolhimento, $grupo_acolhimento){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO escala_acolhimento(data_acolhimento, hora_acolhimento , dia_acolhimento, tempo_liturgico_acolhimento, grupo_acolhimento) 
	VALUES (:data_acolhimento, :hora_acolhimento, :dia_acolhimento, :tempo_liturgico_acolhimento, :grupo_acolhimento)");

	$cadastrar->bindValue("data_acolhimento", $data_acolhimento, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_acolhimento", $hora_acolhimento, PDO::PARAM_STR);
	$cadastrar->bindValue("dia_acolhimento", $dia_acolhimento, PDO::PARAM_STR);
	$cadastrar->bindValue("tempo_liturgico_acolhimento", $tempo_liturgico_acolhimento, PDO::PARAM_INT);
	$cadastrar->bindValue("grupo_acolhimento", $grupo_acolhimento, PDO::PARAM_INT);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Actividade com PDO...
function cadastrarPDOactividade($data_actividade, $hora_actividade, $tipo_de_actividade, $objectivo_actividade, $local_actividade, $responsavel_actividade, $participantes_actividade){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO actividade(data_actividade, hora_actividade , tipo_de_actividade, objectivo_actividade, local_actividade, responsavel_actividade, participantes_actividade) 
	VALUES (:data_actividade, :hora_actividade, :tipo_de_actividade, :objectivo_actividade, :local_actividade, :responsavel_actividade, :participantes_actividade)");

	$cadastrar->bindValue("data_actividade", $data_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_actividade", $hora_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("tipo_de_actividade", $tipo_de_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("objectivo_actividade", $objectivo_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("local_actividade", $local_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("responsavel_actividade", $responsavel_actividade, PDO::PARAM_STR);
	$cadastrar->bindValue("participantes_actividade", $participantes_actividade, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}




//Funçao cadastrar Missa com PDO...
function cadastrarPDOmissa($tipo_missa, $data_missa ,$padre_missa, $dia_missa, $hora_missa, $acolitos_missa, $leitores_missa, $coral_missa, $acolhimento_missa, $ministros_missa, $leituras_missa){

	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO missa(tipo_missa, data_missa ,padre_missa, dia_missa, hora_missa, acolitos_missa, leitores_missa, coral_missa, acolhimento_missa, ministros_missa, leituras_missa) 
	VALUES (:tipo_missa, :data_missa, :padre_missa, :dia_missa, :hora_missa, :acolitos_missa, :leitores_missa, :coral_missa, :acolhimento_missa, :ministros_missa, :leituras_missa)");

	$cadastrar->bindValue("tipo_missa", $tipo_missa, PDO::PARAM_STR);
	$cadastrar->bindValue("data_missa", $data_missa, PDO::PARAM_STR);
	$cadastrar->bindValue("padre_missa", $padre_missa, PDO::PARAM_INT);
	$cadastrar->bindValue("dia_missa", $dia_missa, PDO::PARAM_STR);
	$cadastrar->bindValue("hora_missa", $hora_missa, PDO::PARAM_STR);
	$cadastrar->bindValue("acolitos_missa", $acolitos_missa, PDO::PARAM_INT);
	$cadastrar->bindValue("leitores_missa", $leitores_missa, PDO::PARAM_INT);
	$cadastrar->bindValue("coral_missa", $coral_missa, PDO::PARAM_INT);
	$cadastrar->bindValue("acolhimento_missa", $acolhimento_missa, PDO::PARAM_INT);
	$cadastrar->bindValue("ministros_missa", $ministros_missa, PDO::PARAM_INT);
	$cadastrar->bindValue("leituras_missa", $leituras_missa, PDO::PARAM_INT);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}


//Funçao cadastrar Informação Semanal com PDO...
function cadastrarPDOInformacaoSemanal($titulo_info_papa, $informacao_papa, $titulo_info_liturgia, $informacao_liturgia, $titulo_info_outro, $informacao_outro){

	 	 	 	 	 	 	
	$pdo = conectarPDO();
	$cadastrar = $pdo->prepare("INSERT INTO informacao_semanal(titulo_info_papa, informacao_papa, titulo_info_liturgia, informacao_liturgia, titulo_info_outro, informacao_outro) 
	VALUES (:titulo_info_papa, :informacao_papa, :titulo_info_liturgia, :informacao_liturgia, :titulo_info_outro, :informacao_outro)");

	$cadastrar->bindValue("titulo_info_papa", $titulo_info_papa, PDO::PARAM_STR);
	$cadastrar->bindValue("informacao_papa", $informacao_papa, PDO::PARAM_STR);
	$cadastrar->bindValue("titulo_info_liturgia", $titulo_info_liturgia, PDO::PARAM_STR);
	$cadastrar->bindValue("informacao_liturgia", $informacao_liturgia, PDO::PARAM_STR);
	$cadastrar->bindValue("titulo_info_outro", $titulo_info_outro, PDO::PARAM_STR);
	$cadastrar->bindValue("informacao_outro", $informacao_outro, PDO::PARAM_STR);
	$cadastrar->execute();

	if ($cadastrar->rowCount() == 1) {
		return true;
	}else{
		return false;
	}
}



//Funçao deletar dados do Usuario com PDO... 
function deletarPDOusuario($usuario_id){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare(" DELETE FROM usuario WHERE usuario_id = :usuario_id");
		$deletar -> bindValue(":usuario_id", $usuario_id,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}	


//Funçao deletar dados do Coordenador com PDO... 
function deletarPDOcoordenador($id_coordenador){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare(" DELETE FROM coordenador WHERE id_coordenador = :id_coordenador");
		$deletar -> bindValue(":id_coordenador", $id_coordenador,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}	


//Funçao deletar dados do Comissão com PDO... 
function deletarPDOcomissao($id_comissao){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare(" DELETE FROM comissao WHERE id_comissao = :id_comissao");
		$deletar -> bindValue(":id_comissao", $id_comissao,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}	



//Funçao deletar dados do Grupo com PDO... 
function deletarPDOgrupo($id_grupo){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare(" DELETE FROM grupo WHERE id_grupo = :id_grupo");
		$deletar -> bindValue(":id_grupo", $id_grupo,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}	


//Funçao deletar dados do Membro com PDO... 
function deletarPDOmembro($id_membro){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare(" DELETE FROM membro WHERE id_membro = :id_membro");
		$deletar -> bindValue(":id_membro", $id_membro,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//Funçao deletar dados do Membro com PDO... 
function deletarPDOtipogrupo($id_tipo_grupo){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare(" DELETE FROM tipogrupo WHERE id_tipo_grupo = :id_tipo_grupo");
		$deletar -> bindValue(":id_tipo_grupo", $id_tipo_grupo,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...

//Funçao deletar dados do Tempo Liturgico com PDO... 
function deletarPDOtempoLiturgico($id_tempo_liturgico){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM tempo_liturgico WHERE id_tempo_liturgico = :id_tempo_liturgico");
		$deletar -> bindValue(":id_tempo_liturgico", $id_tempo_liturgico,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...

//Funçao deletar dados do Leituras com PDO... 
function deletarPDOleituras($id_leituras){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM leituras WHERE id_leituras = :id_leituras");
		$deletar -> bindValue(":id_leituras", $id_leituras,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...

//Funçao deletar dados do Escala de Animação com PDO... 
function deletarPDOescalaAnimacao($id_escala_animacao){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM escala_animacao WHERE id_escala_animacao = :id_escala_animacao");
		$deletar -> bindValue(":id_escala_animacao", $id_escala_animacao,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...

//Funçao deletar dados do Escala de Proclamadores com PDO... 
function deletarPDOescalaProclamadores($id_escala_proclamador){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM escala_proclamador WHERE id_escala_proclamador = :id_escala_proclamador");
		$deletar -> bindValue(":id_escala_proclamador", $id_escala_proclamador,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...

//Funçao deletar dados do Escala de Padres com PDO... 
function deletarPDOescalaPadre($id_escala_padre){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM escala_padre WHERE id_escala_padre = :id_escala_padre");
		$deletar -> bindValue(":id_escala_padre", $id_escala_padre,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...


//Funçao deletar dados do Escala de Ministro com PDO... 
function deletarPDOescalaMinistro($id_escala_ministro){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM escala_ministro_eucaristia WHERE id_escala_ministro = :id_escala_ministro");
		$deletar -> bindValue(":id_escala_ministro", $id_escala_ministro,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...



//Funçao deletar dados do Escala de Acolhimento com PDO... 
function deletarPDOescalaAcolhimento($id_escala_acolhimento){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM escala_acolhimento WHERE id_escala_acolhimento = :id_escala_acolhimento");
		$deletar -> bindValue(":id_escala_acolhimento", $id_escala_acolhimento,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...


//Funçao deletar dados do Actividade com PDO... 
function deletarPDOactividade($id_actividade){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM actividade WHERE id_actividade = :id_actividade");
		$deletar -> bindValue(":id_actividade", $id_actividade,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...


//Funçao deletar dados do Missa com PDO... 
function deletarPDOmissa($id_missa){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM missa WHERE id_missa = :id_missa");
		$deletar -> bindValue(":id_missa", $id_missa,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...


//Funçao deletar dados do Informação Semanal com PDO... 
function deletarPDOinformacaoSemanal($id_informacao_semanal){
	
	try{
		$pdo = conectarPDO();
		$deletar = $pdo ->	prepare("DELETE FROM informacao_semanal WHERE id_informacao_semanal = :id_informacao_semanal");
		$deletar -> bindValue(":id_informacao_semanal", $id_informacao_semanal,PDO::PARAM_INT);
		$deletar -> execute();
		
		if($deletar -> rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao deletar dados...


//funçao listar dados do usuario com PDO...
function listarPDOusuario(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM usuario');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}

//funçao listar dados do Coordenador com PDO...
function listarPDOcoordenador(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM coordenador');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}



//funçao listar dados do Comissão com PDO...
function listarPDOcomissao(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM comissao');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Patrimonio com PDO...
function listarPDOpatrimonio(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM patrimonio');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Emprestimo com PDO...
function listarPDOemprestimo(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM emprestimo');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Reserva com PDO...
function listarPDOreserva(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM reserva');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}

//funçao listar dados do Doadores com PDO...
function listarPDOdoadores(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM doador');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Doação com PDO...
function listarPDOdoacao(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM doacao');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Necessitados com PDO...
function listarPDOnecessitados(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM necessitado');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Grupo com PDO...
function listarPDOgrupo(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM grupo ORDER BY grupo.id_grupo DESC');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}

//funçao listar dados do Grupo com PDO...
function listarPDOgrupoCoral(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM grupo WHERE id_tipo_grupo = 4');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}

//funçao listar dados do Grupo com PDO...
function listarPDOgrupoAcolhimento(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM grupo WHERE id_tipo_grupo = 1');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Membro com PDO...
function listarPDOmembro(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM membro');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}

//funçao listar dados do Membro com PDO...
function listarPDOmembroProclamador(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM membro WHERE id_grupo = 26');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}


//funçao listar dados do Membro com PDO...
function listarPDOtipogrupo(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM tipogrupo');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Projecto...

//funçao listar dados do Tempo Liturgico com PDO...
function listarPDOtempoLiturgico(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM tempo_liturgico');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Tempo Liturgico...

//funçao listar dados do Leituras com PDO...
function listarPDOleituras(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM leituras');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Leituras...

//funçao listar dados do Escala Animação com PDO...
function listarPDOescalaAnimacao(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM escala_animacao');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Escala Animação...

//funçao listar dados do Escala Proclamadores com PDO...
function listarPDOescalaProclamadores(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM escala_proclamador');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Escala Proclamadores...


//funçao listar dados do Escala Padres com PDO...
function listarPDOescalaPadres(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM escala_padre');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Escala Padres...



//funçao listar dados do Escala Ministro com PDO...
function listarPDOescalaMinistro(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM escala_ministro_eucaristia');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Escala Padres...

//funçao listar dados do Escala Acolhimento com PDO...
function listarPDOescalaAcolhimento(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM escala_acolhimento');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados do Escala Acolhimento...



//funçao listar dados de Actividade com PDO...
function listarPDOescalaActividade(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM actividade');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados de Actividade...



//funçao listar dados de Missa com PDO...
function listarPDOmissa(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM missa order by id_missa desc limit 3');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados de Missa...

//funçao listar dados de Informação Semanal com PDO...
function listarPDOinformacaoSemanal(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM informacao_semanal order by id_informacao_semanal desc limit 1');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados de Informação Semanal...


//funçao listar dados de Informação Semanal com PDO...
function listarPDOinformacaoSemanalAll(){
	try{
		$pdo = conectarPDO();
		$listar = $pdo->query('SELECT * FROM informacao_semanal');
		$listar->execute();
		if($listar->rowCount() > 0){
			return $listar->fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}
}
//fim da funçao listar dados de Informação Semanal...


//funçao pegar pelo id sem PDO o Usuario...
function pegarPeloIdSemPDOusuario($usuario_id){
	$sql = "SELECT * FROM usuario WHERE usuario_id = '$usuario_id'";
	$query = mysql_query($sql);

	if (mysql_num_rows($query) > 0) {
		return mysql_fetch_object($query);
	}
}
//Fim da funçao de pegar pelo id sem PDO o Usuario...


//Pegar pelo ID Coordenador com PDO...
function pegarPeloIDComPDOcoordenador($id_coordenador){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM coordenador WHERE grupo_coordenador_id = ?');
		$listar -> bindValue(1, $id_coordenador, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}

//Pegar pelo ID Coordenador com PDO...
function pegarPeloIDComPDOMembroComissao($id_comissao){

	$pdo = conectarPDO();
//select * from membro inner join grupo INNER JOIN coordenador on coordenador.grupo_coordenador_id = grupo.id_grupo and membro.id_grupo = grupo.id_grupo where grupo.id_comissao = 2 ;
	try{
		$listar = $pdo -> prepare('SELECT * FROM membro INNER JOIN grupo on membro.id_grupo = grupo.id_grupo where grupo.id_comissao = ?');
		$listar -> bindValue(1, $id_comissao, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}

//Pegar pelo ID Comissão com PDO...
function pegarPeloIDComPDOcomissao($id_comissao){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM comissao WHERE id_comissao = ?');
		$listar -> bindValue(1, $id_comissao, PDO::PARAM_INT);
		$listar -> execute();
		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}


//Pegar pelo ID Grupo com PDO...
function pegarPeloIDComPDOgrupo($id_grupo){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM grupo WHERE id_grupo = ?');
		$listar -> bindValue(1, $id_grupo, PDO::PARAM_INT);
		$listar -> execute();
		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}

//Pegar pelo ID Grupo com PDO...
function pegarPeloIDComPDOgrupotipo($id_tipo_grupo){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM grupo WHERE id_tipo_grupo = ?');
		$listar -> bindValue(1, $id_tipo_grupo, PDO::PARAM_INT);
		$listar -> execute();
		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}


//Pegar pelo ID Grupo com PDO...
function pegarPeloIDComPDOgrupoComissao($id_comissao){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM grupo WHERE id_comissao = ?');
		$listar -> bindValue(1, $id_comissao, PDO::PARAM_INT);
		$listar -> execute();
		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}

//Pegar pelo ID Membro com PDO...
function pegarPeloIDComPDOmembro($id_membro){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM membro WHERE id_membro = ?');
		$listar -> bindValue(1, $id_membro, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...




//Pegar pelo ID Membro com PDO...
function pegarPeloIDComPDOmembroGrupo($id_grupo){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM membro WHERE id_grupo = ?');
		$listar -> bindValue(1, $id_grupo, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...


//Pegar pelo ID Membro com PDO...
function pegarPeloIDComPDOcomissaoGrupo($id_comissao){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM grupo WHERE id_comissao = ?');
		$listar -> bindValue(1, $id_comissao, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}


//Pegar pelo ID Membro com PDO...
function pegarPeloIDComPDOtipogrupo($id_tipo_grupo){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM tipogrupo WHERE id_tipo_grupo = ?');
		$listar -> bindValue(1, $id_tipo_grupo, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...

//Pegar pelo ID Membro com PDO...
function pegarPeloIDComPDOtempoLiturgico($id_tempo_liturgico){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM tempo_liturgico WHERE id_tempo_liturgico = ?');
		$listar -> bindValue(1, $id_tempo_liturgico, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...


//Pegar pelo ID Membro com PDO...
function pegarPeloIDComPDOleituras($id_leituras){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM leituras WHERE id_leituras = ?');
		$listar -> bindValue(1, $id_leituras, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...

//Pegar pelo ID Escala Animação com PDO...
function pegarPeloIDComPDOescalaAnimacao($id_escala_animacao){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM escala_animacao WHERE id_escala_animacao = ?');
		$listar -> bindValue(1, $id_escala_animacao, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...


//Pegar pelo ID Escala Proclamadores com PDO...
function pegarPeloIDComPDOescalaProclamadores($id_escala_proclamador){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM escala_proclamador WHERE id_escala_proclamador = ?');
		$listar -> bindValue(1, $id_escala_proclamador, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...



//Pegar pelo ID Escala Padre com PDO...
function pegarPeloIDComPDOescalaPadre($id_escala_padre){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM escala_padre WHERE id_escala_padre = ?');
		$listar -> bindValue(1, $id_escala_padre, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...



//Pegar pelo ID Escala Ministro com PDO...
function pegarPeloIDComPDOescalaMinistro($id_escala_ministro){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM escala_ministro_eucaristia WHERE id_escala_ministro = ?');
		$listar -> bindValue(1, $id_escala_ministro, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...

//Pegar pelo ID Escala Acolhimento com PDO...
function pegarPeloIDComPDOescalaAcolhimento($id_escala_acolhimento){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM escala_acolhimento WHERE id_escala_acolhimento = ?');
		$listar -> bindValue(1, $id_escala_acolhimento, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...

//Pegar pelo ID Actividade com PDO...
function pegarPeloIDComPDOactividade($id_actividade){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM actividade WHERE id_actividade = ?');
		$listar -> bindValue(1, $id_actividade, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...



//Pegar pelo ID Missa com PDO...
function pegarPeloIDComPDOmissa($id_missa){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM missa WHERE id_missa = ?');
		$listar -> bindValue(1, $id_missa, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...


//Pegar pelo ID Informação Semanal com PDO...
function pegarPeloIDComPDOinformacaoSemanal($id_informacao_semanal){

	$pdo = conectarPDO();

	try{
		$listar = $pdo -> prepare('SELECT * FROM informacao_semanal WHERE id_informacao_semanal = ?');
		$listar -> bindValue(1, $id_informacao_semanal, PDO::PARAM_INT);
		$listar -> execute();

		if ($listar -> rowCount() > 0) {
			return $listar -> fetchAll(PDO::FETCH_OBJ);
		}
	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da funçao de Pegar pelo ID com PDO...

//funçao alterar dados...
function alterarPDOusuario($nome, $sobrenome, $username, $senha, $nivel, $estado, $foto){

	try{
		$pdo = conectarPDO();
		$update = $pdo->prepare('UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, username = :username, senha = :senha, nivel = :nivel, estado = :estado, foto = :foto WHERE usuario_id = :usuario_id');
		$update->bindValue(":nome", $nome);
		$update->bindValue(":sobrenome", $sobrenome);
		$update->bindValue(":username", $username);
		$update->bindValue(":senha", $senha);
		$update->bindValue(":nivel", $nivel);
		$update->bindValue(":estado", $estado);
		$update->bindValue(":foto", $foto);
		$update->execute();

		if ($update->rowCount() == 1) {
			return true;
		}else{
			return false;
		}

	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}


//funçao alterar dados do coordenador...
function alterarPDOcoordenador($grupo_coordenador_id, $cargo_coordenador, $descricao_cargo_coordenador, $membro_coordenador_id, $data_inicio_coordenador, $data_fim_coordenador){

	try{
		$pdo = conectarPDO();
		$update = $pdo->prepare('UPDATE coordenador SET grupo_coordenador_id = :grupo_coordenador_id, cargo_coordenador = :cargo_coordenador, descricao_cargo_coordenador = :descricao_cargo_coordenador, membro_coordenador_id = :membro_coordenador_id, data_inicio_coordenador = :data_inicio_coordenador, data_fim_coordenador = :data_fim_coordenador  WHERE id_coordenador = :id_coordenador');
		$update->bindValue(":grupo_coordenador_id", $grupo_coordenador_id);
		$update->bindValue(":cargo_coordenador", $cargo_coordenador);
		$update->bindValue(":descricao_cargo_coordenador", $descricao_cargo_coordenador);
		$update->bindValue(":membro_coordenador_id", $membro_coordenador_id);
		$update->bindValue(":data_inicio_coordenador", $data_inicio_coordenador);
		$update->bindValue(":data_fim_coordenador", $data_fim_coordenador);
		$update->execute();

		if ($update->rowCount() == 1) {
			return true;
		}else{
			return false;
		}

	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}


//funçao alterar dados do comissão...
function alterarPDOcomissao($nome_comissao, $detalhes_comissao, $regulamento_comissao, $imagem_comissao){

	try{
		$pdo = conectarPDO();
		$update = $pdo->prepare('UPDATE comissao SET nome_comissao = :nome_comissao, detalhes_comissao = :detalhes_comissao, regulamento_comissao = :regulamento_comissao, imagem_comissao = :imagem_comissao WHERE id_comissao = :id_comissao');

		$update->bindValue(":nome_comissao", $nome_comissao);
		$update->bindValue(":detalhes_comissao", $detalhes_comissao);
		$update->bindValue(":regulamento_comissao", $regulamento_comissao);
		$update->bindValue(":imagem_comissao", $imagem_comissao);
		$update->execute();

		if ($update->rowCount() == 1) {
			return true;
		}else{
			return false;
		}

	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}


//funçao alterar dados do grupo...
function alterarPDOgrupo($nome_grupo, $carisma_grupo, $imagem_grupo, $regulamento_grupo, $fundacao_grupo, $padroeiro_grupo, $tipo_grupo, $quantidade_membros_grupo, $id_comissao){

	try{
		$pdo = conectarPDO();
		$update = $pdo->prepare('UPDATE grupo SET nome_grupo = :nome_grupo, carisma_grupo = :carisma_grupo, imagem_grupo = :imagem_grupo, regulamento_grupo = :regulamento_grupo, fundacao_grupo = :fundacao_grupo, padroeiro_grupo = :padroeiro_grupo, tipo_grupo = :tipo_grupo, quantidade_membros_grupo = :quantidade_membros_grupo, id_comissao = :id_comissao WHERE id_grupo = :id_grupo');

		$update->bindValue(":nome_grupo", $nome_grupo);
		$update->bindValue(":carisma_grupo", $carisma_grupo);
		$update->bindValue(":imagem_grupo", $imagem_grupo);
		$update->bindValue(":regulamento_grupo", $regulamento_grupo);
		$update->bindValue(":fundacao_grupo", $fundacao_grupo);
		$update->bindValue(":padroeiro_grupo", $padroeiro_grupo);
		$update->bindValue(":tipo_grupo", $tipo_grupo);
		$update->bindValue(":quantidade_membros_grupo", $quantidade_membros_grupo);
		$update->bindValue(":id_comissao", $id_comissao);
		$update->execute();

		if ($update->rowCount() == 1) {
			return true;
		}else{
			return false;
		}

	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}

//funçao alterar dados do membro...
function alterarPDOmembro($nome_membro, $id_grupo, $data_nascimento_membro, $telefone_membro, $email_membro, $endereco_membro, $foto_membro, $foto_sacramento_baptismo, $foto_sacramento_confirmacao, $foto_sacramento_matrimonio, $data_sacramento_baptismo, $data_sacramento_confirmacao, $data_sacramento_matrimonio, $paroquia_sacramento_baptismo, $paroquia_sacramento_confirmacao, $paroquia_sacramento_matrimonio, $data_inicio_membro, $data_fim_membro){

	try{
		$pdo = conectarPDO();
		$update = $pdo->prepare('UPDATE membro SET nome_membro = :nome_membro, id_grupo = :id_grupo, data_nascimento_membro = :data_nascimento_membro, telefone_membro = :telefone_membro, email_membro = :email_membro, endereco_membro = :endereco_membro, foto_membro = :foto_membro, foto_sacramento_baptismo = :foto_sacramento_baptismo, foto_sacramento_confirmacao = :foto_sacramento_confirmacao, foto_sacramento_matrimonio = :foto_sacramento_matrimonio, data_sacramento_baptismo = :data_sacramento_baptismo, data_sacramento_confirmacao = :data_sacramento_confirmacao, data_sacramento_matrimonio = :data_sacramento_matrimonio, paroquia_sacramento_baptismo = :paroquia_sacramento_baptismo, paroquia_sacramento_confirmacao = :paroquia_sacramento_confirmacao, paroquia_sacramento_matrimonio = :paroquia_sacramento_matrimonio, data_inicio_membro = :data_inicio_membro, data_fim_membro = :data_fim_membro WHERE id_membro = :id_membro');

		$update->bindValue("nome_membro", $nome_membro);
		$update->bindValue("id_grupo", $id_grupo);
		$update->bindValue("data_nascimento_membro", $data_nascimento_membro);
		$update->bindValue("telefone_membro", $telefone_membro);
		$update->bindValue("email_membro", $email_membro);
		$update->bindValue("endereco_membro", $endereco_membro);
		$update->bindValue("foto_membro", $foto_membro);
		$update->bindValue("foto_sacramento_baptismo", $foto_sacramento_baptismo);
		$update->bindValue("foto_sacramento_confirmacao", $foto_sacramento_confirmacao);
		$update->bindValue("foto_sacramento_matrimonio", $foto_sacramento_matrimonio);
		$update->bindValue("data_sacramento_baptismo", $data_sacramento_baptismo);
		$update->bindValue("data_sacramento_confirmacao", $data_sacramento_confirmacao);
		$update->bindValue("data_sacramento_matrimonio", $data_sacramento_matrimonio);
		$update->bindValue("paroquia_sacramento_baptismo", $paroquia_sacramento_baptismo);
		$update->bindValue("paroquia_sacramento_confirmacao", $paroquia_sacramento_confirmacao);
		$update->bindValue("paroquia_sacramento_matrimonio", $paroquia_sacramento_matrimonio);
		$update->bindValue("data_inicio_membro", $data_inicio_membro);
		$update->bindValue("data_fim_membro", $data_fim_membro);
		$update->execute();

		if ($update->rowCount() == 1) {
			return true;
		}else{
			return false;
		}

	}catch(PDOException $e){
		echo "Erro: ".$e -> getMessage();
	}
}
//fim da função alterar dados...


//funçao logar usuario...
function logar($login, $senha){
	$pdo = conectarPDO();
	try{
		$logar = $pdo->prepare('SELECT * FROM usuario WHERE username = ? AND senha = ?');
		$logar->bindValue(1, $login);
		$logar->bindValue(2, $senha);
		$logar->execute();
		
		if($logar->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();	
	}
}
//fim da funçao logar usuario...

//funçao para validar os dados...
function validar($campo,$valor,$tipo){
	
	global $erro;

	if(!empty($campo)){
		switch($tipo){
			case 'INT':
				$int = filter_var($campo, FILTER_SANITIZE_NUMBER_INT);

				if(!filter_var($int,FILTER_VALIDATE_INT)){
					$erro = "O valor passado tem que ser um numero inteiro";
				}else{
					return $int;
				}
			break;
			
			case 'STR':
				$str = filter_var($campo, FILTER_SANITIZE_SPECIAL_CHARS);
				return $str;
			break;
			
			case 'STR':
				$str = filter_var($campo, FILTER_SANITIZE_SPECIAL_CHARS);
				return $str;
			break;
			
			default:
			break;
		}
	}else{
		$erro = "O campo $campo é obrigatorio!";
	}
}

function logOut($sessao){
	if (isset($_SESSION[$sessao])){
		unset($_SESSION[$sessao]);
		session_destroy();
		header('Location:http://localhost/sigeli/index.php');
	}
}
?>