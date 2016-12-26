<?php

    session_start();  //A seção deve ser iniciada em todas as páginas
    if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
            session_destroy();            //Destroi a seção por segurança
            header("Location: ../login/"); exit; //Redireciona o visitante para login
    }

    include('conecta.php');
    
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
    $nascimento = $_POST['nascimento'];

    mysql_query("
        UPDATE user
        SET nome = '$nome', sobrenome = '$sobrenome',
        cidade = '$cidade', 
        bairro = '$bairro',
        rua = '$rua',
        numero = '$numero',
        complemento = '$complemento',
        telefone = '$telefone',
        ramal = '$ramal',
        empresa = '$empresa', nascimento = '$nascimento'
        WHERE id = ".$_SESSION['usuarioID']);

    $sql="select * from user where id='".$_SESSION['usuarioID']."'"; 
    $resultados = mysql_query($sql)or die (mysql_error());
    $res=mysql_fetch_array($resultados);

    $_SESSION['nomeUsuario']=$res['nome'];
    $_SESSION['sobrenome']=$res['sobrenome'];
    $_SESSION['cidade']=$res['cidade'];
    $_SESSION['bairro']=$res['bairro'];
    $_SESSION['rua']=$res['rua'];
    $_SESSION['numero']=$res['numero'];
    $_SESSION['complemento']=$res['complemento'];
    $_SESSION['telefone']=$res['telefone'];
    $_SESSION['ramal']=$res['ramal'];
    $_SESSION['nascimento']=$res['nascimento'];
    $_SESSION['empresa']=$res['empresa'];

    header("Location: ../dashboard/");
   
?>