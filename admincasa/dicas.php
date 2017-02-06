<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: index.php"); exit; //Redireciona o visitante para login
}

include 'server/conecta.php';

if ($_SESSION['nivel'] != 3) {
  session_destroy();
  header("Location: index.php"); exit;
}
?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
      <title>Administração | Lá de Casa</title>
      <meta charset="utf-8">

      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    
      <nav>
        <div class="nav-wrapper  grey darken-2">
          <div class="container">
            <a href="index.php" class="brand-logo">La de Casa</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Voltar</a></li>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">

              <li><a href="index.php">Voltar</a></li>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container">
        <h2 align="center">Postar Dica ou Informativo</h2>

        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s6"><a class="active" href="#test1">Posts</a></li>
              <li class="tab col s6"><a href="#test2">Novo Post</a></li>
            </ul>
          </div>


          <!-- GALERIA DE IMAGENS -->
          <div id="test1" class="col s12 l12 grey lighten-5">
            <div class="fotos"  style="margin-top: 50px;">
              

                <div class="row">
                  <div class="container">

                  <?php
                    $query = mysql_query("SELECT * FROM post ORDER BY id DESC");
                    while ($dados = mysql_fetch_array($query)) {
                      $autor = $dados['id_user'];
                      $user = mysql_query("SELECT * FROM user WHERE id = '$autor'");
                      $pega = mysql_fetch_array($user); ?>

                      <div class="col s12 m12 l8 offset-l2 card-panel orange" style="margin-top: 60px !important; padding-bottom: 30px !important">
                        <div class="" style="height: auto !important">
                          <div class="col s6 offset-s3 l2 offset-l5" style="margin-top: -40px;">
                            <img src="../img/perfil/<?= $pega['imagem'] ?>" style="width: 100% !important; border-radius: 1000px; box-shadow: 0 -10px 10px 0 #eee">
                          </div>
                          <h4 class="col l12 s12 white-text center"><?= $dados['titulo'] ?></h4>
                          <span class="col l12 s12 white-text center" style="margin-top: -10px !important">Publicado por <?= $pega['nome'] ?> <?= $pega['sobrenome'] ?> em <?= date('d/m/Y', strtotime($dados['data_post'])) ?></span>
                          <p class="col l12 s12 white-text" style="margin-top: 30px !important"><?= $dados['texto'] ?></p>
                        </div>
                      </div>

                    <?php }
                  ?>

                    

                  </div>
                </div>


            </div>
          </div>


          <!-- CADASTRO DE IMAGENS -->
          <div id="test2" class="col s12 l10 offset-l1 grey lighten-3">
              <div class="row">
                <?php

                include "server/conecta.php";

                $id=$_POST['id'];

                $sql = "SELECT * FROM produto WHERE id='$id'";
                $resultado= mysql_query($sql) or die (mysql_error());
                $info = mysql_fetch_array($resultado);

                $id_produto = $info['id'];

                ?>


                <!-- CADASTRO DE IMAGENS -->
                <div id="test2" class="col s12 l10 offset-l1 grey lighten-3">
                  <form class="row" action="server/postar_dica.php" method="post" enctype="multipart/form-data">

                    <div class="col l12 s12" hidden="">
                      <h5 >ID:</h5>
                      <div class="input-field col s12">
                        <input id="first_name" value="<?= $_SESSION['usuarioID'] ?>" type="text" class="validate" name="id">
                      </div>
                    </div>

                    <div class="col l12 s12">
                      <h5 >Título:</h5>
                      <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate" name="titulo">
                      </div>
                    </div>

                    <div class="col l12">
                      <h5 >Dica ou Informação:</h5>
                      <div class="input-field col s12">
                        <textarea name="texto"></textarea>
                      </div>
                    </div>

                    
                    <div class="col l12 eoq">
                      <input type="submit" class="btn grey darken-2 col l4 offset-l4" name="" value="Cadastrar">
                    </div>
                    
                    
                  </form>
                </div>



              </div>
          </div>



        </div>
      </div>    


    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <script type="text/javascript">
        $( document ).ready(function(){
          $(".button-collapse").sideNav();
          $('ul.tabs').tabs();
          $('select').material_select();

          $('input[type=file]').change(function() {
             $('.doidona').text("Arquivo Selecionado");
          });
        });
      </script>
    </body>
  </html>