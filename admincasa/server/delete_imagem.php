<?php
  include "conecta.php";
  
  $id=$_POST['id'];
  
  //Consulta no banco de dados
  $sql="DELETE FROM galeria WHERE id='$id'"; 
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../galeria.php");
  }else{
  	echo "erro";
  }
?>