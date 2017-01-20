<?php
//inclui a conexao com o banco
ini_set( 'display_errors', true );
error_reporting( E_ALL );
include("conecta.php");

// Escolher o formato do arquivo
header("Content-type: application/msexcel");

// Nome que arquivo será salvo
header("Content-Disposition: attachment; filename=planilha_clientes.xls");

// Criar a tabela para receber os dados
echo "<table>";
 echo "<tr>";
	echo "<td>Id</td>";
	echo "<td>Data</td>";
	echo "<td>Nome</td>";
	echo "<td>E-mail</td>";
	echo "<td>Telefone</td>";
 echo "</tr>";

// Procurar as informações do BD
$SQL = "SELECT * FROM user DESC" ;
$executa = mysql_query($SQL);

while ($resultado = mysql_fetch_array($executa)){
 echo "<tr>";
	echo "<td>".$resultado['id']."</td>";
	echo "<td>" . $resultado["nascimento"] . "</td>";
	echo "<td>" . $resultado["nome"] . "</td>";
	echo "<td>" . $resultado["email"] . "</td>";
	echo "<td>" . $resultado["telefone"] . "</td>";
 echo "</tr>";
}
echo "</table>"; 
?>