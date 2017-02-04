<?php

include('conecta.php');

$id_user = $_SESSION['usuarioID'];
$titulo = utf8_decode($_POST['titulo']);
$texto = utf8_decode($_POST['texto']);
$data = date("Y/m/d", time());

$foi = mysql_query("INSERT INTO post (id_user, titulo, texto, data_post) VALUES ('$id_user', '$titulo', '$texto', '$data')") or die(mysql_error());

if ($foi) {
	echo "foi";
}

//header("Location: ../dicas.php");

   
?>