<?php   
  // emails para quem será enviado o formulário
  $emailenviar = "seuemail@seudominio.com.br";
  $destino = $_POST['email'];
  $assunto = "Lá de casa | Recuperar senha";

  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";
  
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){  	
  	echo 1;
  } else {
  	echo 0;
  }
?>