<?php

include('conecta.php');

$qryLista = "SELECT * FROM galeria";
$sql = mysql_query($qryLista) or die(mysql_error());

while ($resultado = mysql_fetch_assoc($sql)) { 
   $vetor[] = $resultado;
}

//Passando vetor em forma de json
 echo json_encode($vetor);

?>