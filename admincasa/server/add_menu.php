<?php
  include "conecta.php";  
  $menu= utf8_decode($_POST['menu']);
  $diario= utf8_decode($_POST['diario']);
  $quinzenal= utf8_decode($_POST['quinzenal']);
  $mensal= utf8_decode($_POST['mensal']);

  //Consulta no banco de dados
  $sql="INSERT INTO menu (nome, diario, quinzenal, mensal) VALUES ('$menu', '$diario', '$quinzenal', '$mensal')";
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../sistema.php");
  }else{
  	echo "erro";
  }
?>