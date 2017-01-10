<?php
	
	include '../server/conecta.php';
	session_start();  //A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
	        session_destroy();            //Destroi a seção por segurança
	        header("Location: ../login/"); exit; //Redireciona o visitante para login
	}

	$pagamento = date("Y/m/d", time());

	$id_user = $_SESSION['usuarioID'];
	$sql = "UPDATE user SET pagseguro = 0, pagamento = 1, forma_pagamento = 2, data_pagamento = '$pagamento'   WHERE id = '$id_user'";
	$vai = mysql_query($sql) or die(mysql_error());

	$_SESSION['pagamento'] = 1;
	$_SESSION['forma_pagamento'] = 2;
	$_SESSION['pagseguro']= 0;
	header("Location: ../dashboard/");

?>