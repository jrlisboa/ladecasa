<?php
  include "conecta.php";
  
  $id=$_GET['id'];
  $pagamento = date("Y/m/d", time());
  //Consulta no banco de dados
  $sql="UPDATE user SET pagamento = 1, pagseguro = 0, data_pagamento = '$pagamento', forma_pagamento = 2 WHERE id= '$id'"; 
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../detalhes_cliente.php?id=".$id);
  }else{
  	echo "erro";
  }
?>