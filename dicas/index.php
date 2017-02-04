<?php
session_start();  //A seção deve ser iniciada em todas as páginas
include '../server/conecta.php';
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        $semSessao = 1; //Redireciona o visitante para login
}else{
  $semSessao = 0;
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
      <title>Dicas | Lá de Casa</title>

      <meta charset="utf-8">

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
                  <li><a class="menuItem" href="#">Dicas</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="#">Cardápios</a></li>
                  <?php if ($semSessao == 1) { ?>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                  <?php }else{ ?>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                  <?php } ?>
                  
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="#">Cardápios</a></li>
                  <?php if ($semSessao == 1) { ?>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                  <?php }else{ ?>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </nav>
          </div>


          <div class="row">
            <div class="container">

            <?php
              $query = mysql_query("SELECT * FROM post ORDER BY id DESC");
              while ($dados = mysql_fetch_array($query)) {
                $autor = $dados['id_user'];
                $user = mysql_query("SELECT * FROM user WHERE id = '$autor'");
                $pega = mysql_fetch_array($user); ?>

                <div class="col s12 m12 l8 offset-l2 card-panel orange" style="margin-top: 60px !important">
                  <div class="" style="height: auto !important">
                    <div class="col s6 offset-s3 l2 offset-l5" style="margin-top: -40px;">
                      <img src="../img/perfil/<?= $pega['imagem'] ?>" style="width: 100% !important; border-radius: 1000px; box-shadow: 0 -10px 10px 0 #eee">
                    </div>
                    <h4 class="col l8 s12 white-text"><?= $dados['titulo'] ?></h4>
                    <span class="col l8 s12 white-text"><?= date('d/m/Y', strtotime($dados['data_post'])) ?></span>
                    <p class="col l12 s12 white-text"><?= $dados['texto'] ?></p>
                  </div>
                </div>

              <?php }
            ?>

              

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