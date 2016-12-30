<?php
  session_start();  //A seção deve ser iniciada em todas as páginas
  if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
          session_destroy();            //Destroi a seção por segurança
          header("Location: ../login/"); exit; //Redireciona o visitante para login
  }
  include 'conecta.php';
  
  $id=$_GET['id'];
  $id_user = $_SESSION['usuarioID'];
  $data = date("Y/m/d", time());
  
  //Consulta no banco de dados
  $sql="INSERT INTO favorito (id_user, id_produto, data) VALUES ('$id_user', '$id', '$data')"; 
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../favoritos/");
  }else{
  	echo "erro";
  }
?>