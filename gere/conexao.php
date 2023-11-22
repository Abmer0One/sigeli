<?php
	
	function conectar(){
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$bd = "mambo_liturgico";
		
		$con = new mysqli($servidor,$usuario,$senha,$bd);
		return $con;
	}

	$conexao = conectar();
	
	define('HOST','localhost');
	define('USER', 'root');
	define('PASS', '');
	define('BD', 'mambo_liturgico');

	//conexao sem funçao...	
    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "mambo_liturgico";
	
	$con = new mysqli($servidor,$usuario,$senha,$bd);
	return $con;
	//fim de conexao sem funçao...

	// Com PDO...

	

	function conectarPDO(){
		$dsn = "mysql:host=" . HOST . ";dbname=" .BD;
		try{
			$conectar = new PDO($dsn,USER,PASS);
			$conectar -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conectar;
		}catch(PDOException $e){
			echo "Erro ao conectar ao banco" , $e -> getMessage();
		}
	}	
?>


