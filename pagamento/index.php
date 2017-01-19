<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}
include "../server/conecta.php";
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="../css/style.css"  />
      <title>Menus | Lá de Casa</title>

      <link rel="apple-touch-icon" sizes="57x57" href="../img/fav/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../img/fav/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../img/fav/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../img/fav/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../img/fav/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../img/fav/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../img/fav/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../img/fav/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../img/fav/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="../img/fav/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../img/fav/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../img/fav/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../img/fav/favicon-16x16.png">
      <link rel="manifest" href="../img/fav/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#F39C12">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <div class="tudo row">

          <div class="navbar-fixed">
            <nav id="navbar" class="navMenus">
              <div class="nav-wrapper">
                <a href="../" class="brand-logo">Lá de Casa</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="#">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="#">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
              </div>
            </nav>
          </div>

        <div class="container">
          <!--<div class="col l6 s12 menus boletao">

            <?php
            //if ($_SESSION['plano'] == 1) {
            ?>

            <div class="tituloMenus tituloPagamentos">
              <h4>Pagamento via Boleto Bancário:</h4>
              <span>Clique no botão abaixo para gerar um novo boleto.<br>Após a confirmação do pagamento, você poderá utilizar o sistema pelos próximos 15 dias.</span>
            </div>

            <div class="btnMenus row">
                <a href="../server/gerar_boleto.php" class="col l12 s12 linkMenu">
                  <div class="col s10 pgBtn">
                  </div>
                </a>
            </div>

            <?php
            //}else{
            ?>

            <div class="tituloMenus tituloPagamentos">
              <h4>Pagamento via Boleto Bancário:</h4>
              <span>Clique no botão abaixo para gerar um novo boleto.<br>Após a confirmação do pagamento, você poderá utilizar o sistema pelos próximos 30 dias.</span>
            </div>

            <div class="btnMenus row">
                <a href="../server/gerar_boleto.php" class="col l12 s12 linkMenu">
                  <div class="col s12 pgBtn">
                  </div>
                </a>
            </div>

            <?php
            //}
            ?>           
            
          </div>-->

          <span class="col l12 s12" style="margin-top: 5vh !important; text-align: center;">Pagamentos realizados até 12:00 ( meio-dia ), a entrega inicia no próximo dia útil. Após este horário ficará para o próximo dia.</span>


          <div class="col l4 s12 menus boletao">

            <div class="tituloMenus tituloPagamentos">
              <h4>Pagamento via DOC<br>(Depósito em Conta):</h4>
              <span style="font-size: 18px !important">Solicite os dados para a transferência entrando em contato através das opções abaixo.</span>
            </div>

            <div class="btnMenus row">
                <ul class="collection">

                  <?php
                    $menu_user = $_SESSION['menu'];
                    if($_SESSION['plano'] == 1) {

                      $seleciona = "SELECT * FROM menu WHERE id='$menu_user'";
                      $vaila = mysql_query($seleciona);
                      $rolmes = mysql_fetch_array($vaila);

                      echo '<li class="collection-item" style="font-size: 25px !important">Valor: R$'.number_format($rolmes['quinzenal'], 2, ',', '.').'</li>';
                    }elseif ($_SESSION['plano'] == 2) {

                      $seleciona = "SELECT * FROM menu WHERE id='$menu_user'";
                      $vaila = mysql_query($seleciona);
                      $rolmes = mysql_fetch_array($vaila);

                      echo '<li class="collection-item" style="font-size: 25px !important">Valor: R$'.number_format($rolmes['mensal'], 2, ',', '.').'</li>';
                    }
                  ?>

                  <li class="collection-item">(11) 96058 - 7920 - VIVO</li>
                  <li class="collection-item">(11) 5102-4323 - FIXO</li>
                  <li class="collection-item"><a href="../dashboard/contato.php" class="green btn white-text col l12 s12">Contato pelo site</a></li>
                </ul>
            </div>
          </div>

          <div class="col l4 s12 menus pagao">
            <div class="tituloMenus tituloPagamentos maquinatit">
              <h4>Pagamento no ato do 1º Recebimento</h4>
              <span style="font-size: 18px !important">Clique abaixo para entrar em contato e solicitar esta forma de pagamento!</span>
            </div>
            
            <a href="../dashboard/contato.php"><div class="col l12 s12 imagemPag"><img class="col s12" src="../img/icones/maquina.png"></div></a>       
          </div>

          <div class="col l4 s12 menus pagao">
            <div class="tituloMenus tituloPagamentos segurotit" style="height: 20vh !important">
              <h4>Efetuar pagamento via PagSeguro:</h4>
              <span style="font-size: 18px !important">Clique abaixo para entrar em um ambiente seguro de pagamento com diversas opções como cartão de crédito, boleto e etc.</span>
            </div>

            <a href="../server/pagseguro.php" style="margin-top: 40px !important">
              <div class="col l12 s12 imagemPag btn-large white" style="height: 110px !important"><img class="col s12" src="../img/icones/pagseguro.png"></div>
            </a>
          </div>

        </div>
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $(".button-collapse").sideNav();
        });
      </script>
    </body>
  </html>