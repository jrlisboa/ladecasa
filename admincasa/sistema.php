<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: index.php"); exit; //Redireciona o visitante para login
}

include 'server/conecta.php';
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

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    
      <nav>
        <div class="nav-wrapper  grey darken-2">
          <div class="container">
            <a href="#!" class="brand-logo">La de Casa</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="produtos.php">Produtos</a></li>
              <li><a href="clientes.php">Clientes</a></li>
              <li><a href="sistema.php">Sistema</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="produtos.php">Produtos</a></li>
              <li><a href="clientes.php">Clientes</a></li>
              <li><a href="sistema.php">Sistema</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="container row">
        <h2 align="center">Sistema</h2>

        




        <div class="print" id="printable">

        <div class="col l6 s12">
          <ul class="collection with-header">
            <li class="collection-header"><h4>Novo Menu</h4></li>

            <li style="height: 90px;">
              <form action="server/add_menu.php" method="post">
                <div class="row" style="padding: 20px;">
                  <input type="text" name="menu" class="col l7 novoMenu" placeholder="Nome do novo menu.">
                  <input style="margin-top: 5px;" type="submit" name="enviar" value="Adicionar" class="btn col l4 offset-l1 blue white-text">
                </div>
              </form>              
            </li>
            
          </ul> 

          <ul class="collection with-header">
            <li class="collection-header"><h4>Menus dispoíveis:</h4></li>

            <?php
                $selec = "SELECT * FROM menu";
                $vaila = mysql_query($selec) or die(mysql_error());
                while($pegou = mysql_fetch_array($vaila)){
            ?>
                <li class="collection-item"><div>Menu <?= $pegou['nome'] ?><a href="server/apaga_menu.php?id=<?= $pegou['id'] ?>" class="secondary-content"><i class="material-icons red-text">delete</i></a></div></li>
            <?php } ?>
            
          </ul>
        </div>


        <div class="col l6 s12">
          <ul class="collection with-header">
            <li class="collection-header"><h4>Novo Tipo</h4></li>

            <li style="height: 90px;">
              <form action="server/add_tipo.php" method="post">
                <div class="row" style="padding: 20px;">
                  <input type="text" name="tipo" class="col l7 novoMenu" placeholder="Nome do novo tipo.">
                  <input style="margin-top: 5px;" type="submit" name="enviar" value="Adicionar" class="btn col l4 offset-l1 blue white-text">
                </div>
              </form>              
            </li>
            
          </ul>

          <ul class="collection with-header">
            <li class="collection-header"><h4>Tipos dispoíveis:</h4></li>

            <?php
                $selec = "SELECT * FROM tipo";
                $vaila = mysql_query($selec) or die(mysql_error());
                while($pegou = mysql_fetch_array($vaila)){
            ?>
                <li class="collection-item"><div><?= $pegou['nome'] ?><a href="server/apaga_tipo.php?id=<?= $pegou['id'] ?>" class="secondary-content"><i class="material-icons red-text">delete</i></a></div></li>
            <?php } ?>
            
          </ul>
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

          $('input[type=file]').change(function() {
             $('label').text("Arquivo Selecionado");
          });
        });
      </script>
    </body>
  </html>