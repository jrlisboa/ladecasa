<?php
 // Inclui a conexão
 include_once('conexao.php');

 // Nome do Arquivo do Excel que será gerado
 $arquivo = 'dados_emails.xls';

 // Criamos uma tabela HTML com o formato da planilha para excel
 $tabela = '<table border="1">';
 $tabela .= '<tr>';
 $tabela .= '<td colspan="2">Tabela de E-mails</tr>';
 $tabela .= '</tr>';
 $tabela .= '<tr>';
 $tabela .= '<td><b>Nome</b></td>';
 $tabela .= '<td><b>Email</b></td>';
 $tabela .= '</tr>';

 // Puxando dados do Banco de dados
 $resultado = mysql_query('SELECT * FROM emails');

 while($dados = mysql_fetch_array($resultado))
 {
  $tabela .= '<tr>';
  $tabela .= '<td>'.$dados['nome'].'</td>';
  $tabela .= '<td>'.$dados['email'].'</td>';
  $tabela .= '</tr>';
 }

 $tabela .= '</table>';

 // Força o Download do Arquivo Gerado
 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
 echo $tabela;
?>