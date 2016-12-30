<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}
include '../server/conecta.php';
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="../css/style.css"  />
      <title>Favoritos | Lá de Casa</title>

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
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
              </div>
            </nav>
          </div>


          <div id="salgados">
            
              <div class="container col l5 offset-l1 s12 produtos" style="margin-top: -40px; margin-bottom: 80px;">            

                 <?php
                 $menu = $_SESSION['menu'];


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
                        $id_user = $_SESSION['usuarioID'];

                        $qryLista = "SELECT * FROM produto where id_tipo='$id_tipo'";
                        $sql = mysql_query($qryLista) or die(mysql_error());
                        while ($resultado = mysql_fetch_array($sql)) {                          
                          $id_produto = $resultado['id'];

                          $novoSql="SELECT * FROM produto_menu WHERE id_menu='$menu'";
                          $novaQuery= mysql_query($novoSql) or die(mysql_error());
                          while ($dados = mysql_fetch_array($novaQuery)) {
                            
                            if ($dados['id_produto'] == $id_produto) {
                              $foram[] = array();
                              if (!in_array($id_produto, $foram)) {
                                                    
                            ?>
                              <div class="btnProduto btnItem4Produto col l3 s6">
                                <!--<div class="col l12 s12 saberMais">Saber mais</div>-->
                                <div class="col l12 s12 imgProduto"><img src="../img/produtos/<?= $resultado['imagem'] ?>"></div>
                                <a href="../server/favoritar.php?id=<?= $resultado['id'] ?>"><div class="col l12 s12 red saberMais">Favoritar</div></a>                                
                                <span class="col l12 s12"><?= $resultado['nome'] ?></span>
                                
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

              
              
              <div class="col l4 offset-l1 s12">
              <div class="tituloMenus produtosTitulo " style="margin-bottom: 30px;">
                <h4>Favoritos</h4>              
              </div> 
                            
                <ul class="collection">

                  <?php
                    $select = "SELECT * FROM favorito
                    INNER JOIN produto ON (produto.id = favorito.id_produto) WHERE id_user='$id_user'";
                    $vamola = mysql_query($select);
                    while($lista = mysql_fetch_array($vamola)){
                  ?>

                  <li class="collection-item avatar">
                    <img src="../img/produtos/<?= $lista['imagem'] ?>" alt="" class="circle">
                    <span class="title"><?= $lista['nome'] ?></span>
                    </p>
                    <a href="../server/remover_favorito.php?id_produto=<?= $lista['id'] ?>&id_user=<?= $id_user ?>" class="secondary-content">Excluir Favorito</a>
                  </li>

                  <?php } ?>
                  
                </ul>
              </div>

              <div class="btnBottom row" align="center">
                <a id="abreFinal" style="cursor: pointer;"><span class="col l2 offset-l5 s6 offset-s3 produtosCadastro btnProximo">Concluir</span></a>
              </div>

          </div>


          <div id="final" hidden class="row">
            
              <div class="tituloMenus tituloDash tituloPedido col l8 offset-l2" align="center">
                <h4>Seus favoritos foram adicionados!</h4>
                <span>Perfeito! Anotamos seus novos favoritos, caso você ja tenha definido os seus itens favoritos, iremos atualizá-los na próxima quinzena!</span>
              </div>

              <div class="parabens col l2 offset-l5 s12">
                <img src="../img/icones/parabens.svg">
              </div>

              <div class="btnBottom row" align="center">
                <a id="finaliza" href="../dashboard"><span class="col l2 offset-l5 s6 offset-s3 produtosCadastro btnProximo">Voltar ao Perfil</span></a>
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


      <script type="text/javascript">
        
        $('#abreFinal').click(function(){
          $('#salgados').hide();
          $('#final').fadeIn(500);
        });


        //$('.btnProduto').click(function(){
        //  $(this).addClass("produtoSelecionado");
        //});
      </script>
    </body>
  </html>