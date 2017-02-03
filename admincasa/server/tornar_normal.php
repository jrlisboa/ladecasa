<?php
  include "conecta.php";
  
  $id=$_GET['id'];
  //Consulta no banco de dados
  $sql="UPDATE user SET nivel = 0 WHERE id= '$id'"; 
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../detalhes_cliente.php?id=".$id);
  }else{
  	echo "erro";
  }
?>