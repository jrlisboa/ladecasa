<?php
include 'conecta.php';
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}

if ($_SESSION['plano'] == 0) {
	mysql_query("UPDATE user SET id_plano = 2 WHERE id = '$id_user'");
	$_SESSION['plano'] = 2;
}

$id_user = $_SESSION['usuarioID'];

$sql = "UPDATE user SET pagseguro = 1 WHERE id = '$id_user'";
$vai = mysql_query($sql) or die(mysql_error());

$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

//$data = 'email=seuemail@dominio.com.br&amp;token=95112EE828D94278BD394E91C4388F20&amp;currency=BRL&amp;itemId1=0001&amp;itemDescription1=Notebook Prata&amp;itemAmount1=24300.00&amp;itemQuantity1=1&amp;itemWeight1=1000&amp;itemId2=0002&amp;itemDescription2=Notebook Rosa&amp;itemAmount2=25600.00&amp;itemQuantity2=2&amp;itemWeight2=750&amp;reference=REF1234&amp;senderName=Jose Comprador&amp;senderAreaCode=11&amp;senderPhone=56273440&amp;senderEmail=comprador@uol.com.br&amp;shippingType=1&amp;shippingAddressStreet=Av. Brig. Faria Lima&amp;shippingAddressNumber=1384&amp;shippingAddressComplement=5o andar&amp;shippingAddressDistrict=Jardim Paulistano&amp;shippingAddressPostalCode=01452002&amp;shippingAddressCity=Sao Paulo&amp;shippingAddressState=SP&amp;shippingAddressCountry=BRA';
/*
Caso utilizar o formato acima remova todo código abaixo até instrução $data = http_build_query($data);
*/

$data['email'] = 'ladecasacomidasaudavel@gmail.com';
$data['token'] = '3BEB9DB888A848BC8AAC42071279AC50';
$data['currency'] = 'BRL';

$data['itemId1'] = '0001';
$data['itemDescription1'] = utf8_decode('Pagamento Lá de Casa');

$menu_user = $_SESSION['menu'];

if ($_SESSION['plano'] == 1) {

	$seleciona = "SELECT * FROM menu WHERE id='$menu_user'";
	$vaila = mysql_query($seleciona);
	$rolmes = mysql_fetch_array($vaila);
	$data['itemAmount1'] = $rolmes['quinzenal'];
	
}elseif ($_SESSION['plano'] == 2) {

	$seleciona = "SELECT * FROM menu WHERE id='$menu_user'";
	$vaila = mysql_query($seleciona);
	$rolmes = mysql_fetch_array($vaila);
	$data['itemAmount1'] = $rolmes['mensal']."0";
	
}
$data['itemQuantity1'] = '1';
$data['itemWeight1'] = '0';

$data['reference'] = 'REF1234';
$data['senderName'] = $_SESSION['nomeUsuario']." ".$_SESSION['sobrenome'];
$data['senderAreaCode'] = '11';

$data['senderEmail'] = $_SESSION['email'];
$data['shippingType'] = '1';
$data['shippingAddressStreet'] = $_SESSION['rua'];
$data['shippingAddressNumber'] = $_SESSION['numero'];
$data['shippingAddressComplement'] = $_SESSION['complemento'];
$data['shippingAddressDistrict'] = $_SESSION['bairro'];
$data['shippingAddressCity'] = $_SESSION['cidade'];
$data['shippingAddressState'] = 'SP';
$data['shippingAddressCountry'] = 'BRA';
$data['redirectURL'] = 'http://ladecasa.net.br/pagamento/sucssesswianlubouslafrLeml1pho25Oeho5pl9.php';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);

if($xml == 'Unauthorized'){
//Insira seu código de prevenção a erros

header('Location: ../pagamento/erro.php');
exit;//Mantenha essa linha
}
curl_close($curl);

$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
echo $data;
echo "Dados inválidos";
exit;
}
header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);