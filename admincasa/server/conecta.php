<?php
//conexão com o servidor
error_reporting(0);
$conect = mysql_connect("usr199940028922.mysql.uhserver.com", "user40021999", "Babuinolegal.1");

header('content-type : text/html', 'charset=utf-8');
 mysql_query("SET NAMES 'utf-8'");
 mysql_query('SET character_set_connection=utf8');
 mysql_query('SET character_set_cliente=utf8');
 mysql_query('SET character_set_results=utf8');

// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro
if (!$conect) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");

// Caso a conexão seja aprovada, então conecta o Banco de Dados.
$db = mysql_select_db("usr199940028922");
?>