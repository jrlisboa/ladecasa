<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}
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


          <div class="col l6 offset-l3 s12 menus" style="margin-top: 10vh">

            <?php
            if ($_SESSION['plano'] == 1) {
            ?>

            <div class="tituloMenus" align="left">
              <h4>Pagamento via Boleto Bancário:</h4>
              <span>Clique no botão abaixo para gerar um novo boleto.<br>Após a confirmação do pagamento, você poderá utilizar o sistema pelos próximos 15 dias.</span>
            </div>

            <div class="btnMenus row">
                <a href="../server/gerar_boleto.php" class="col l12 s12 linkMenu">
                  <div class="btnItem">
                    <span class="col l7 offset-l1 s12" style="margin-top: 40px; font-size: 30px; font-weight: 300">GERAR BOLETO (PLANO QUINZENAL)</span>
                    <div class="col l3 s12"><img style="margin-top: 30px;" src="../img/icones/invoice.svg"></div>
                  </div>
                </a>
            </div>

            <?php
            }else{
            ?>

            <div class="tituloMenus">
              <h4>Pagamento via Boleto Bancário:</h4>
              <span>Clique no botão abaixo para gerar um novo boleto.<br>Após a confirmação do pagamento, você poderá utilizar o sistema pelos próximos 30 dias.</span>
            </div>

            <div class="btnMenus row">
                <a href="../server/gerar_boleto.php" class="col l12 s12 linkMenu">
                  <div class="btnItem">                    
                    <span class="col l7 offset-l1 s12" style="margin-top: 40px; font-size: 30px">GERAR BOLETO (PLANO MENSAL)</span>
                    <div class="col l2 s12" ><img style="margin-top: 30px;" src="../img/icones/invoice.svg"></div>
                  </div>
                </a>
            </div>

            <?php
            }
            ?>           
            
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