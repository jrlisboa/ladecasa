<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: index.php"); exit; //Redireciona o visitante para login
}

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
      <script>tinymce.init({ selector:'textarea' });</script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    
      <nav>
        <div class="nav-wrapper  grey darken-2">
          <div class="container">
            <a href="#!" class="brand-logo">La de Casa</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <?php if ($_SESSION['nivel'] != 3): ?>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="sistema.php">Sistema</a></li>
              <?php endif ?>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">

              <?php if ($_SESSION['nivel'] != 3): ?>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="sistema.php">Sistema</a></li>
              <?php endif ?>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="container">
        <h2 align="center">Postar Dica ou Informativo</h2>

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

              <div class="col l12 s12">
                <h5 >Título:</h5>
                <div class="input-field col s12">
                  <input id="first_name" type="text" class="validate" name="nome">
                </div>
              </div>

              <div class="col l12">
                <h5 >Dica ou Informação:</h5>
                <div class="input-field col s12">
                  <textarea name="detalhes"></textarea>
                </div>
              </div>

              
              <div class="col l12 eoq">
                <input type="submit" class="btn grey darken-2 col l4 offset-l4" name="" value="Cadastrar">
              </div>
              
              
            </form>
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