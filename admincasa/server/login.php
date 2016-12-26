<?php
  include "conecta.php";
  
  $email=$_POST['email'];	//Pegando dados passados por AJAX
  $senha=$_POST['senha'];
  
  //Consulta no banco de dados
  $sql="select * from user where email='".$email."' and senha='".$senha."' and nivel=3"; 
  $resultados = mysql_query($sql)or die (mysql_error());
  $res=mysql_fetch_array($resultados); //
	if (@mysql_num_rows($resultados) == 0){
		echo 0;	//Se a consulta não retornar nada é porque as credenciais estão erradas
	}
	
	else{
		echo 1;	//Responde sucesso
		if(!isset($_SESSION)) 	//verifica se há sessão aberta
		session_start();		//Inicia seção
		//Abrindo seções
		$_SESSION['usuarioID']=$res['id']; 		
		$_SESSION['nomeUsuario']=$res['nome'];
		$_SESSION['sobrenome']=$res['sobrenome'];
		$_SESSION['email']=$res['email'];
		$_SESSION['endereco']=$res['end_escritorio'];
		$_SESSION['nascimento']=$res['nascimento'];
		$_SESSION['cpf']=$res['cpf'];
		$_SESSION['empresa']=$res['empresa'];
		$_SESSION['imagem']=$res['imagem'];

		exit;	
	}
?>