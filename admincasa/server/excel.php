<?php
 include "conecta.php";
 $sql = "SELECT * FROM user DESC";
 $resultado = mysql_query($sql);

 $tabela = '<table border="1">';

 $tabela .= '<tr>';
 $tabela .= '<td colspan="23">Tabela de CLIENTES</tr>';
 $tabela .= '</tr>';

 $tabela .= '<tr>';
 $tabela .= '<td><b>ID</b></td>';
 $tabela .= '<td><b>NOME</b></td>';
 $tabela .= '<td><b>SOBRENOME</b></td>';
 $tabela .= '<td><b>NASCIMENTO</b></td>';
 $tabela .= '<td><b>TELEFONE</b></td>';
 $tabela .= '<td><b>CELULAR</b></td>';
 $tabela .= '<td><b>RAMAL</b></td>';
 $tabela .= '<td><b>CIDADE</b></td>';
 $tabela .= '<td><b>BAIRRO</b></td>';
 $tabela .= '<td><b>RUA</b></td>';
 $tabela .= '<td><b>NÚMERO</b></td>';
 $tabela .= '<td><b>COMPLEMENTO</b></td>';
 $tabela .= '<td><b>EMPRESA</b></td>';
 $tabela .= '<td><b>DEPARTAMENTO</b></td>';
 $tabela .= '<td><b>CPF</b></td>';
 $tabela .= '<td><b>EMAIL</b></td>';
 $tabela .= '<td><b>MENU</b></td>';
 $tabela .= '<td><b>PLANO</b></td>';
 $tabela .= '<td><b>PERIODO</b></td>';
 $tabela .= '<td><b>EMBALAGEM</b></td>';
 $tabela .= '<td><b>DATA DE PAGAMENTO</b></td>';
 $tabela .= '<td><b>FORMA DE PAGAMENTO</b></td>';
 $tabela .= '<td><b>DATA DE CADASTRO</b></td>';
 $tabela .= '</tr>';

 while($dados = mysql_fetch_array($resultado)){

		if ($dados['id_periodo'] == 1) {
		  $periodo = "Manhã";
		}elseif ($dados['id_periodo'] == 2) {
		  $periodo = "Tarde";
		}else{
		  $periodo = "Não definido";
		}

		if ($dados['id_plano'] == 1) {
		  $plano = "Quinzenal";
		}elseif ($dados['id_periodo'] == 2) {
		  $plano = "Mensal";
		}else{
		  $plano = "Não definido";
		}

		if ($dados['tipo_embalagem'] == 1) {
		  $embalagem = "Retornável";
		}elseif ($dados['tipo_embalagem'] == 2) {
		  $embalagem = "Reciclável";
		}else{
		  $embalagem = "Não definido";
		}

		if ($dados['data_pagamento'] == "0000-00-00") {
			$data_pagamento = "Não definido";
		}else{
			$data_pagamento = date('d/m/Y', strtotime($dados['data_pagamento']));
		}

		if ($dados['data_cadastro'] == "0000-00-00") {
			$data_cadastro = "Não definido";
		}else{
			$data_cadastro = date('d/m/Y', strtotime($dados['data_cadastro']));
		}

		if (empty($dados['complemento'])) {
			$complemento = "Não definido";
		}else{
			$complemento = $dados['complemento'];
		}


		if ($pegou['forma_pagamento'] == 1) {
    $pagamento = "Transferência (DOC)";
  }elseif ($pegou['forma_pagamento'] == 2) {
    $pagamento = "PagSeguro";
  }elseif ($pegou['forma_pagamento'] == 3) {
    $pagamento = "Moderninha";
  }else{
    $pagamento = "Não definido"; }


  $tabela .= '<tr>';
	 $tabela .= '<td><b>'.$dados['id'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['nome'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['sobrenome'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['nascimento'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['telefone'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['celular'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['ramal'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['cidade'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['bairro'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['rua'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['numero'].'</b></td>';
	 $tabela .= '<td><b>'.$complemento.'</b></td>';
	 $tabela .= '<td><b>'.$dados['empresa'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['departamento'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['cpf'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['email'].'</b></td>';
	 $tabela .= '<td><b>'.$dados['id_menu'].'</b></td>';
	 $tabela .= '<td><b>'.$plano.'</b></td>';
	 $tabela .= '<td><b>'.$periodo.'</b></td>';
	 $tabela .= '<td><b>'.$embalagem.'</b></td>';
	 $tabela .= '<td><b>'.$data_pagamento.'</b></td>';
	 $tabela .= '<td><b>'.$pagamento.'</b></td>';
	 $tabela .= '<td><b>'.$data_cadastro.'</b></td>';
	 $tabela .= '</tr>';
 }

 $tabela .= '</table>';

 // Força o Download do Arquivo Gerado
 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{'Clientes.xls'}\"");
 echo $tabela;
?>