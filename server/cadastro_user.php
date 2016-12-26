<?php

	include "conecta.php";
	$nome = utf8_decode($_POST['nome']);
	$sobrenome = utf8_decode($_POST['sobrenome']);
	$end_escritorio = utf8_decode($_POST['end_escritorio']);
	$empresa = utf8_decode($_POST['empresa']);
	$cpf = $_POST['cpf'];
	$nascimento = $_POST['nascimento'];
	$imagem = 'perfil.jpg';
	$email = $_POST['email'];
	$senha = utf8_decode($_POST['senha']);

	$erros = 0;

	if (empty($nome)) {
		$erros++;
	}else if (empty($sobrenome)) {
		$erros++;
	}else if (empty($end_escritorio)) {
		$erros++;
	}else if (empty($empresa)) {
		$erros++;
	}else if (empty($cpf)) {
		$erros++;
	}else if (empty($nascimento)) {
		$erros++;
	}else if (empty($email)) {
		$erros++;
	}else if (empty($senha)) {
		$erros++;
	}


	if ($erros == 0) {
		
		$sqlEmail="select * from user where email='".$email."'"; 
		$resultadosEmail = mysql_query($sqlEmail)or die (mysql_error());
		if (@mysql_num_rows($resultadosEmail) == 0){

			$sqlEmail="select * from user where cpf='".$cpf."'"; 
			$resultadosEmail = mysql_query($sqlEmail)or die (mysql_error());
			if (@mysql_num_rows($resultadosEmail) == 0){

				//CADASTRANDO O NOVO USUÁRIO
				$sql = "INSERT INTO user (nome, sobrenome, end_escritorio, empresa, cpf, nascimento, imagem, email, senha) 
			    VALUES ('$nome', '$sobrenome', '$end_escritorio', '$empresa', '$cpf', '$nascimento', '$imagem', '$email', '$senha')";
			    mysql_query($sql) or die(error());


			    //EFETUANDO O LOGIN DO NOVO USUÁRIO
			    $sql="select * from user where email='".$email."' and senha='".$senha."'"; 
			    $resultados = mysql_query($sql)or die (mysql_error());
			    $res=mysql_fetch_array($resultados); //
				if (@mysql_num_rows($resultados) == 0){
					echo 1;	//Se a consulta não retornar nada é porque as credenciais estão erradas
				}			
				else{

					echo 0;
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

			}else{
				echo 3;
			}
			
		}else{
			echo 2;
		}

	}else{
		echo 1;
	}

	

?>