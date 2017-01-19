<?php
	session_start();  //A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
	        session_destroy();            //Destroi a seção por segurança
	        header("Location: ../login/"); exit; //Redireciona o visitante para login
	}
	$id_user = $_SESSION['usuarioID'];
	include 'conecta.php';
	$antiga    = $_POST['antiga'];
	$nova    = $_POST['nova'];

	if ($_SESSION['usuarioID'] == $antiga){
		mysql_query("UPDATE user SET senha = '$nova' WHERE id = '$id_user'");
		echo 1;
		exit;
	}	
	else{
		echo 0;
	}
?>