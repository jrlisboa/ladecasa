<?php
	session_start();  //A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
	        session_destroy();            //Destroi a seção por segurança
	        header("Location: ../login/"); exit; //Redireciona o visitante para login
	}
	include 'conecta.php';
	$assunto    = $_POST['assunto'];
	$mensagem    = $_POST['mensagem'];

	
  $corpo  = "Enviado por: ".$_SESSION['nomeUsuario']." ".$_SESSION['sobrenome']."\n";
  $corpo .= "Email: ".$_SESSION['email']."\n";
  $corpo .= "\n";
  $corpo .= "Mensagem: ".$mensagem."\n";
  if(mail("contato@ladecasa.net.br",$assunto,$corpo)){
		echo 1;
  } else {
		echo 0;
  }
	
?>