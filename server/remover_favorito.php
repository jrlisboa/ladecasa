<?php
  session_start();  //A seção deve ser iniciada em todas as páginas
  if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
          session_destroy();            //Destroi a seção por segurança
          header("Location: ../login/"); exit; //Redireciona o visitante para login
  }
  include 'conecta.php';
  
  $id_produto=$_GET['id_produto'];
  $id_user=$_GET['id_user'];
  $id_user = $_SESSION['usuarioID'];
  
  //Consulta no banco de dados
  $sql="DELETE FROM favorito WHERE id_produto = '$id_produto' AND id_user = '$id_user'";
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../favoritos/");
    
  }else{
  	echo "erro";
  }
?>