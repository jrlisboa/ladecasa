<?php
  include "conecta.php";
  
  $id=$_GET['id'];
  //Consulta no banco de dados
  $sql="UPDATE user SET pagamento = 0, pagseguro = 0, maquininha = 0, forma_pagamento = 0, data_pagamento = 0000-00-00 WHERE id= '$id'"; 
  $foi = mysql_query($sql)or die (mysql_error());
  if ($foi) {
  	header("Location: ../detalhes_cliente.php?id=".$id);
  }else{
  	echo "erro";
  }
?>