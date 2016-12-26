<?php

    session_start();  //A seção deve ser iniciada em todas as páginas
    if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
            session_destroy();            //Destroi a seção por segurança
            header("Location: ../login/"); exit; //Redireciona o visitante para login
    }

    include('conecta.php');
    
    $nome = utf8_decode($_POST['nome']);
    $sobrenome = utf8_decode($_POST['sobrenome']);
    $end_escritorio = utf8_decode($_POST['end_escritorio']);
    $empresa = utf8_decode($_POST['empresa']);
    $nascimento = $_POST['nascimento'];

    mysql_query("
        UPDATE user
        SET nome = '$nome', sobrenome = '$sobrenome',
        end_escritorio = '$end_escritorio', empresa = '$empresa', nascimento = '$nascimento'
        WHERE id = ".$_SESSION['usuarioID']);

    $sql="select * from user where id='".$_SESSION['usuarioID']."'"; 
    $resultados = mysql_query($sql)or die (mysql_error());
    $res=mysql_fetch_array($resultados);

    $_SESSION['nomeUsuario']=$res['nome'];
    $_SESSION['sobrenome']=$res['sobrenome'];
    $_SESSION['endereco']=$res['end_escritorio'];
    $_SESSION['nascimento']=$res['nascimento'];
    $_SESSION['empresa']=$res['empresa'];


    //$_SESSION['nomeUsuario']=$nome;
    //$_SESSION['sobrenome']=$sobrenome;
    //$_SESSION['endereco']=$end_escritorio;
    //$_SESSION['nascimento']=$nascimento;
    //$_SESSION['empresa']=$empresa;

    header("Location: ../dashboard/");
   
?>