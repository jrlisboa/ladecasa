<?php
session_start();  //A seção deve ser iniciada em todas as páginas

include('../server/conecta.php');
$menu = $_GET['menu'];
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
      <title>Produtos | Lá de Casa</title>

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
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
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
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <?php if ($semSessao == 1) { ?>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                  <?php }else{ ?>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </nav>
          </div>


          </a><div class="topoProdutos">    
          </div>

          <div class="container col l6 offset-l3 s12 produtos">
          
            <?php

            $qryLista = "SELECT * FROM tipo";
            $query = mysql_query($qryLista) or die(mysql_error());
            
            
            while ($final = mysql_fetch_array($query)) { 
              $tipos[] = $final;
              $id_tipo = $final['id'];
            ?>

            <br><br>

            <div class="tituloMenus produtosTitulo categoriaTitulo">
              <h4><?= $final['nome']; ?></h4>              
            </div>

            <div class="btnMenus row">
                <?php

                $qryLista = "SELECT * FROM produto where id_tipo='$id_tipo'";
                $sql = mysql_query($qryLista) or die(mysql_error());
                while ($resultado = mysql_fetch_array($sql)) { 
                  $vetor[] = $resultado;
                  $id_produto = $resultado['id'];

                  $novoSql="SELECT * FROM produto_menu WHERE id_menu='$menu'";
                  $novaQuery= mysql_query($novoSql) or die(mysql_error());
                  while ($dados = mysql_fetch_array($novaQuery)) {
                    
                    if ($dados['id_produto'] == $id_produto) {
                      $foram[] = array();
                      if (!in_array($id_produto, $foram)) {
                                            
                    ?>              
                      <div class="btnProduto btnItem4Produto col l3 s6">
                        <a href="../detalhes/index.php?id=<?= $resultado['id'] ?>"><div class="col l12 s12 saberMais">Saber mais</div></a>
                        <div class="col l12 s12 imgProduto"><img src="../img/produtos/<?= $resultado['imagem'] ?>"></div>
                        <span class="col l12 s12" style="font-weight: 500"><?= $resultado['nome'] ?></span>
                      </div>
                    <?php
                        $foram[] = $id_produto;
                      }
                    }
                  }
                }
                ?>              
            </div>

          <?php                   
          }
          ?>
          </div>


          

          <div class="btnBottom row" align="center">
            <span class="col l2 offset-l5 s6 offset-s3 produtosCadastro">Cadastre-se para pedir</span>
          </div>
        
      </div>



      <!-- FOOTER -->



        <footer class="page-footer ladeFooter cimaFooter">
          <div class="container ">
            <div class="row">
              <div class="col l4 s12">
                <h5 class="white-text">Menu:</h5>
                <ul>
                  <li><a class="white-text" href="../#">Home</a></li>
                  <li><a class="white-text" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="white-text" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="white-text" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="white-text" href="../menus">Cardápios</a></li>
                  <li><a class="white-text" href="../login">Login</a></li>
                </ul>
              </div>

              <div class="col l3 offset-l1 s12">
                <h5 class="white-text">Contas:</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Cadastre-se</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Faça o Login</a></li>
                </ul>
              </div>

              <div class="col l3 offset-l1 s12">
                <h5 class="white-text">Redes Sociais:</h5>
                <div class="row redes">
                  <div class="redeIcon col l4 s4">
                    <a href=""><img src="../img/icones/facebook.svg"></a>
                  </div>
                  <div class="redeIcon col l4 s4">
                    <a href=""><img src="../img/icones/instagram.svg"></a>
                  </div>
                  <div class="redeIcon col l4 s4">
                    <a href=""><img src="../img/icones/twitter.svg"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="footer-copyright">
            <div class="container copy">
            Lá de casa 2016/2017 &copy; Todos os direitos reservados.
            </div>
          </div>
        </footer>

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