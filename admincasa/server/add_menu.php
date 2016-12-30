<?php
  include "conecta.php";  
  $menu= utf8_decode($_POST['menu']);

  //Consulta no banco de dados
  $sql="INSERT INTO menu (nome) VALUES ('$menu')";
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../sistema.php");
  }else{
  	echo "erro";
  }
?>