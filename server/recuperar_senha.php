<?php
	include 'conecta.php';
	$email    = $_POST['email'];

	$select = "SELECT * FROM user WHERE email = '$email'";
	$query = mysql_query($select);
	$dados = mysql_fetch_array($query);
	if (mysql_num_rows($query) == 0) {
		echo 0;
	}else{
		$corpo  = "Obrigado por utilizar o sistema Lá de Casa<BR>\n";
	  $corpo .= "<BR>\n";
	  $corpo .= "Sua senha é: ".$dados['senha']."<BR>\n";
	  if(mail($email,"Assunto",$corpo)){
		echo 1;
	  } else {
		echo 0;
	  }
	}
?>