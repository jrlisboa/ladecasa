<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login.php"); exit; //Redireciona o visitante para login
}

include('conecta.php');
include ('pdf/mpdf.php');

$id_user = $_GET['id'];

$select = "SELECT * FROM user WHERE id='$id_user'";
$vai = mysql_query($select);
$pegou = mysql_fetch_array($vai);

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

if ($pegou['id_plano'] == 1) {
  $embalagem = "Retornável";
}elseif ($pegou['id_periodo'] == 2) {
  $embalagem = "Reciclável";
}else{
  $embalagem = "Não definido";
}

if ($pegou['data_pagamento'] == "0000-00-00") {
	$data_pagamento = "Não definido";
}else{
	$data_pagamento = date('d/m/Y', strtotime($pegou['data_pagamento']));
}

if (empty($pegou['complemento'])) {
	$complemento = "Não definido";
}else{
	$complemento = $pegou['complemento'];
}


if ($pegou['forma_pagamento'] == 1) {
  $pagamento = "Débito (Boleto ou DOC)";
}elseif ($pegou['forma_pagamento'] == 2) {
  $pagamento = "Crédito (Via PagSeguro)";
}else{
  $pagamento = "Não definido"; }


/*$selectado = "SELECT * FROM favorito
INNER JOIN produto ON (produto.id = favorito.id_produto) WHERE id_user='$id_user'";
$vamola = mysql_query($selectado);

while($lista = mysql_fetch_array($vamola)){

		echo '<li>'.$lista['nome'].'</li>';
}*/

$pagina = 
"<html>
	<head>
		<style>
			table {border-collapse: collapse}
			td, table, tr {border: 1px solid black}
			td { padding: 5px 10px 5px 10px }
			#cima{ background-color: #cccccc }
		</style>
	</head>
	<body>
		<h1 align='center'>Relatório | ".$pegou['nome']." ".$pegou['sobrenome']." - ".$pegou['id']."</h1><br>

		<h3>Dados Pessoais:</h3>

		<table cellspacing='0'>
			<tr id='cima'>
				<td>Nome:</td>
				<td>Data de Nascimento:</td>
				<td>Cidade:</td>
				<td>Bairro:</td>
				<td>Rua:</td>
				<td>Número:</td>
				<td>Complemento:</td>				
				<td>CPF:</td>
			</tr>
			<tr>
				<td>".$pegou['nome']." ".$pegou['sobrenome']."</td>
				<td>". date('d/m/Y', strtotime($pegou['nascimento']))."</td>
				<td>".$pegou['cidade'] ."</td>
				<td>".$pegou['bairro'] ."</td>
				<td>". $pegou['rua'] ."</td>
				<td>".$pegou['numero']."</td>
				<td>".$complemento ."</td>
				<td>". $pegou['cpf'] ."</td>
			</tr>
		</table><br>	


		<h3>Opções do usuário:</h3>
		
		<table cellspacing='0'>
			<tr id='cima'>
				<td>Data de Cadastro:</td>
				<td>Período:</td>
				<td>Forma de Pagamento:</td>
				<td>Data de Pagamento:</td>
				<td>Plano:</td>
				<td>Embalagem:</td>
			</tr>
			<tr>
				<td>".date('d/m/Y', strtotime($pegou['data_cadastro'])) ."</td>
				<td>".$periodo ."</td>
				<td>".$pagamento ."</td>
				<td>".$data_pagamento ."</td>
				<td>".$plano ."</td>
				<td>".$embalagem."</td>
			</tr>
		</table><br><br>	


		<h3>Dados de Contato:</h3>
		
		<table cellspacing='0'>
			<tr id='cima'>
				<td>Ramal:</td>
				<td>Telefone:</td>
				<td>Celular:</td>
				<td>Email:</td>
				<td>Empresa:</td>
				<td>Departamento:</td>
			</tr>
			<tr>
				<td>". $pegou['ramal'] ."</td>
				<td>". $pegou['telefone'] ."</td>
				<td>". $pegou['celular'] ."</td>
				<td>". $pegou['email'] ."</td>
				<td>". $pegou['empresa'] ."</td>
				<td>". $pegou['departamento'] ."</td>
			</tr>
		</table><br>

		


		<h4 align='center' >Gerado pelo sistema Lá de Casa</h5>
	</body>
</html>
";

$arquivo = "Usuario_".$id_user.".pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'D');

header("Location: ../detalhes_cliente.php?id=".$id_user);

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>


