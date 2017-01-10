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

if($_SESSION['plano'] == 1){ ?>

<form class="pagseguro" action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
            
<input type="hidden" name="code" value="191F4819AFAFC27AA4DF4F8E38A49676" />
<input type="hidden" name="iot" value="button" />
<input type="image" class="col l12 s12 imagemPag" src="../img/icones/pagseguro.png" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" hidden/>
</form>

<?php }else{ ?>

<form  class="pagseguro" action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
            
<input type="hidden" name="code" value="DBCF2F4B52523AC004B46FB61C00E005" />
<input type="hidden" name="iot" value="button" />
<input type="image" class="col l12 s12 imagemPag" src="../img/icones/pagseguro.png" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" hidden />
</form>


<?php } ?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".pagseguro").submit();
	})
</script>
