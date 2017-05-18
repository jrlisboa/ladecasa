<?php
  include "conecta.php";  
  $observacao=$_POST['observacao'];
  $id=$_POST['id'];

  //Consulta no banco de dados
  $sql="UPDATE user SET observ = '$observacao' WHERE id = '$id'";
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../detalhes_cliente.php?id=".$id);
  }else{
  	echo "erro";
  }
?>