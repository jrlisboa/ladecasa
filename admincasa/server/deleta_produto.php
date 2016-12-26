<?php
  include "conecta.php";
  
  $id=$_POST['id'];
  
  //Consulta no banco de dados
  $sql="DELETE FROM produto WHERE id='$id'"; 
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../produtos.php");
  }else{
  	echo "erro";
  }
?>