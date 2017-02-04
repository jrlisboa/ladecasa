<?php

include('conecta.php');

$id_user = $_SESSION['usuarioID'];
$titulo = utf8_decode($_POST['titulo']);
$texto = utf8_decode($_POST['texto']);
$data = date("Y/m/d", time());

mysql_query("
    INSERT INTO post (id_user, titulo, texto, data_post)
    VALUES ('$id_user', '$titulo', '$texto', '$data')");

header("Location: ../dicas.php");

   
?>