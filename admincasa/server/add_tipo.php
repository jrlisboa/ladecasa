<?php
  include "conecta.php";  
  $tipo=$_POST['tipo'];

  //Consulta no banco de dados
  $sql="INSERT INTO tipo (nome) VALUES ('$tipo')";
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../sistema.php");
  }else{
  	echo "erro";
  }
?>