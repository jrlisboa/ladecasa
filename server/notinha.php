<?php

include('conecta.php');

$qryLista = "SELECT * FROM nota ORDER BY id DESC LIMIT 1 ";
$sql = mysql_query($qryLista) or die(mysql_error());
$result = mysql_fetch_array($sql);

//Passando vetor em forma de json
 echo $result['texto'];

?>