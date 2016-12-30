<?php
  include "conecta.php";
  
  $id=$_GET['id'];

  //Consulta no banco de dados
  $sql="DELETE FROM menu WHERE id= '$id'";
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../sistema.php");
  }else{
  	echo "erro";
  }
?>