<?php

include('conecta.php');
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}

$user = $_SESSION['usuarioID'];
$plano = $_GET['id'];

mysql_query("
    UPDATE user
    SET id_plano = '$plano'
    WHERE id = '$user'");

$_SESSION['plano'] = $plano;
header("Location: ../dashboard/");

   
?>