<?php
//inclui a conexao com o banco
include("conecta.php");

// Procurar as informações do BD
$SQL = "SELECT * FROM user" ;
$executa = mysql_query($SQL);

// Escolher o formato do arquivo
header("Content-type: application/msexcel");

// Nome que arquivo será salvo
header("Content-Disposition: attachment; filename=planilha_clientes.xls");

// Criar a tabela para receber os dados
echo "<table>";
 echo "<tr>";
	echo "<td></td>";
	echo "<td>Data</td>";
	echo "<td>Nome</td>";
	echo "<td>E-mail</td>";
	echo "<td>Telefone</td>";
 echo "</tr>";
/*while ($r = mysql_fetch_array($executa)){
 echo "<tr>";
	echo "<td>".$r['id']."</td>";
	echo "<td>" . $r["nascimento"] . "</td>";
	echo "<td>" . $r["nome"] . "</td>";
	echo "<td>" . $r["email"] . "</td>";
	echo "<td>" . $r["telefone"] . "</td>";
 echo "</tr>";
}*/
echo "</table>"; 
?>