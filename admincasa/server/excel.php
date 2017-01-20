<?php
//inclui a conexao com o banco
include("conecta.php");

// Escolher o formato do arquivo
header("Content-type: application/msexcel");

// Nome que arquivo será salvo
header("Content-Disposition: attachment; filename=planilha_clientes.xls");

// Criar a tabela para receber os dados
echo "<table>";
 echo "<tr>";
	echo "<td>ID</td>";
	echo "<td>NOME</td>";
	echo "<td>SOBRENOME</td>";
	echo "<td>DATA DE NASCIMENTO</td>";
	echo "<td>TELEFONE</td>";
	echo "<td>CELULAR</td>";
	echo "<td>RAMAL</td>";
	echo "<td>CIDADE</td>";
	echo "<td>BAIRRO</td>";
	echo "<td>RUA</td>";
	echo "<td>NUMERO</td>";
	echo "<td>COMPLEMENTO</td>";
	echo "<td>EMPRESA</td>";
	echo "<td>DEPARTAMENTO</td>";
	echo "<td>CPF</td>";
	echo "<td>EMAIL</td>";
	echo "<td>MENU</td>";
	echo "<td>PLANO</td>";
	echo "<td>PERIODO</td>";
	echo "<td>DATA DE PAGAMENTO</td>";
	echo "<td>FORMA DE PAGAMENTO</td>";
	echo "<td>EMBALAGEM</td>";
	echo "<td>DATA DE CADASTRO</td>";
 echo "</tr>";

// Procurar as informações do BD
$SQL = "SELECT * FROM user ORDER BY id DESC" ;
$executa = mysql_query($SQL);

while ($pegou = mysql_fetch_array($executa)){

 if ($pegou['id_periodo'] == 1) {
	  $periodo = "Manhã";
	}elseif ($pegou['id_periodo'] == 2) {
	  $periodo = "Tarde";
	}else{
	  $periodo = "Não definido";
	}

	if ($pegou['id_plano'] == 1) {
	  $plano = "Quinzenal";
	}elseif ($pegou['id_periodo'] == 2) {
	  $plano = "Mensal";
	}else{
	  $plano = "Não definido";
	}

	if ($pegou['tipo_embalagem'] == 1) {
	  $embalagem = "Retornável";
	}elseif ($pegou['tipo_embalagem'] == 2) {
	  $embalagem = "Reciclável";
	}else{
	  $embalagem = "Não definido";
	}

	if (empty($pegou['complemento'])) {
		$complemento = "Não definido";
	}else{
		$complemento = $pegou['complemento'];
	}


	if ($pegou['forma_pagamento'] == 1) {
	  $pagamento = "Transferência (DOC)";
	}elseif ($pegou['forma_pagamento'] == 2) {
	  $pagamento = "PagSeguro";
	}elseif ($pegou['forma_pagamento'] == 3) {
	  $pagamento = "Moderninha";
	}else{
	  $pagamento = "Não definido"; }
 
 echo "<tr>";
		echo "<td>".$pegou['id']."</td>";
		echo "<td>".$pegou['nome']."</td>";
		echo "<td>".$pegou['sobrenome']."</td>";
		echo "<td>".$pegou['nascimento']."</td>";
		echo "<td>".$pegou['telefone']."</td>";
		echo "<td>".$pegou['celular']."</td>";
		echo "<td>".$pegou['ramal']."</td>";
		echo "<td>".$pegou['cidade']."</td>";
		echo "<td>".$pegou['bairro']."</td>";
		echo "<td>".$pegou['rua']."</td>";
		echo "<td>".$pegou['numero']."</td>";
		echo "<td>".$complemento."</td>";
		echo "<td>".$pegou['empresa']."</td>";
		echo "<td>".$pegou['departamento']."</td>";
		echo "<td>".$pegou['numero']."</td>";
		echo "<td>".$pegou['email']."</td>";
		echo "<td>".$pegou['id_menu']."</td>";
		echo "<td>".$plano."</td>";
		echo "<td>".$periodo."</td>";
		echo "<td>".$pegou['data_pagamento']."</td>";
		echo "<td>".$pagamento."</td>";
		echo "<td>".$embalagem."</td>";
		echo "<td>".$pegou['data_cadastro']."</td>";
 echo "</tr>";
}
echo "</table>"; 
?>