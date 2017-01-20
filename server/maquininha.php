<?php
include 'conecta.php';
session_start();
if (!isset($_SESSION['usuarioID'])) { 
        session_destroy();  
        header("Location: ../login/"); exit; 
}

$email = $_POST['email'];

$id_user = $_SESSION['usuarioID'];

$sql = "UPDATE user SET maquininha = 1 WHERE id = '$id_user'";
$vai = mysql_query($sql) or die(mysql_error());

if ($vai) {
	echo 1;
}else{
	echo 0;
}

?>