<?php

include('conecta.php');

$texto = utf8_decode($_POST['texto']);

$foi = mysql_query("INSERT INTO nota (texto) VALUES ('$texto')") or die(mysql_error());

if ($foi) {
	header("Location: ../notinha.php");
}
   
?>