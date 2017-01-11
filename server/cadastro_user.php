<?php

	include "conecta.php";
	$nome = utf8_decode($_POST['nome']);
	$sobrenome = utf8_decode($_POST['sobrenome']);
	$cidade = utf8_decode($_POST['cidade']);
	$bairro = utf8_decode($_POST['bairro']);
	$rua = utf8_decode($_POST['rua']);
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$telefone = $_POST['telefone'];
	$ramal = $_POST['ramal'];
	$empresa = utf8_decode($_POST['empresa']);
	$cpf = $_POST['cpf'];
	$nascimento = $_POST['nascimento'];
	$imagem = 'perfil.jpg';
	$email = $_POST['email'];
	$senha = utf8_decode($_POST['senha']);
	$cadastro = date("Y/m/d", time());

	$erros = 0;

	if (empty($nome)) {
		$erros++;
	}else if (empty($sobrenome)) {
		$erros++;
	}else if (empty($cidade)) {
		$erros++;
	}else if (empty($bairro)) {
		$erros++;
	}else if (empty($rua)) {
		$erros++;
	}else if (empty($numero)) {
		$erros++;
	}else if (empty($telefone)) {
		$erros++;
	}else if (empty($ramal)) {
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
				$sql = "INSERT INTO user (nome, sobrenome, cidade, bairro, rua, numero, complemento, telefone, ramal, empresa, cpf, nascimento, imagem, email, senha, data_cadastro) 
			    VALUES ('$nome', '$sobrenome', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$telefone', '$ramal', '$empresa', '$cpf', '$nascimento', '$imagem', '$email', '$senha', '$cadastro')";
			    mysql_query($sql) or die(error());

			    echo 0;


			    //EFETUANDO O LOGIN DO NOVO USUÁRIO
			    $sql="select * from user where email='".$email."' and senha='".$senha."'"; 
			    $resultados = mysql_query($sql)or die (mysql_error());
			    $res=mysql_fetch_array($resultados); //
				if (@mysql_num_rows($resultados) == 0){
					echo 1;	//Se a consulta não retornar nada é porque as credenciais estão erradas
				}			
				else{
					
					if(!isset($_SESSION)) 	//verifica se há sessão aberta
					session_start();		//Inicia seção
					//Abrindo seções
					$_SESSION['usuarioID']=$res['id']; 		
					$_SESSION['nomeUsuario']=$res['nome'];
					$_SESSION['sobrenome']=$res['sobrenome'];
					$_SESSION['email']=$res['email'];
					$_SESSION['cidade']=$res['cidade'];
					$_SESSION['bairro']=$res['bairro'];
					$_SESSION['rua']=$res['rua'];
					$_SESSION['numero']=$res['numero'];
					$_SESSION['complemento']=$res['complemento'];
					$_SESSION['telefone']=$res['telefone'];
					$_SESSION['ramal']=$res['ramal'];
					$_SESSION['nascimento']=$res['nascimento'];
					$_SESSION['cpf']=$res['cpf'];
					$_SESSION['empresa']=$res['empresa'];
					$_SESSION['imagem']=$res['imagem'];
					$_SESSION['pagamento']=$res['pagamento'];
					$_SESSION['plano']=$res['id_plano'];
					$_SESSION['periodo']=$res['id_periodo'];
					$_SESSION['menu']=$res['id_menu'];
					$_SESSION['pagseguro']=$res['pagseguro'];
					$_SESSION['forma_pagamento']=$res['forma_pagamento'];
					$_SESSION['embalagem']=$res['tipo_embalagem'];


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