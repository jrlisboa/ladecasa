<?php
error_reporting(0);
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
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="produtos.php">Produtos</a></li>
              <li><a href="clientes.php">Clientes</a></li>
              <li><a href="sistema.php">Sistema</a></li>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="produtos.php">Produtos</a></li>
              <li><a href="clientes.php">Clientes</a></li>
              <li><a href="sistema.php">Sistema</a></li>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="container">
        <h2 align="center">Produtos</h2>

        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s6"><a class="active" href="#test1">Produtos</a></li>
              <li class="tab col s6"><a href="#test2">Novo Produto</a></li>
            </ul>
          </div>


          <!-- CADASTRO DE IMAGENS -->
          <div id="test2" class="col s12 l10 offset-l1 grey lighten-3">
            <form class="row" action="server/cadastro_produto.php" method="post" enctype="multipart/form-data">

              <div class="col l6 s12">
                <h5 >Nome:</h5>
                <div class="input-field col s12">
                  <input id="first_name" type="text" class="validate" name="nome">
                </div>
              </div>

              <div class="col l6 s12" style="margin-top: 100px; padding-left: 60px;">
                <label for='selecao-arquivo' class="doidona">Selecionar uma foto &#187;</label>
                <input id='selecao-arquivo' class="opa" type='file' name="imagem" hidden>
              </div>

              <div class="col l6">
                <div class="input-field">
                  <h5 >Tipo:</h5>
                  <select name="tipo">
                    <option value="" disabled selected>Selecione um tipo</option>

                    <?php
                    include('server/conecta.php');
                    $qryLista = "SELECT * FROM tipo";
                    $sql = mysql_query($qryLista) or die(mysql_error());
                      while ($resultado = mysql_fetch_array($sql)) { 
                        $vetor[] = $resultado;                    
                    ?>
                    <option value="<?= $resultado['id'] ?>"><?= $resultado['nome'] ?></option>
                    <?php 
                       } 
                    ?>

                  </select>
                </div>
              </div>             


              <div class="col l6" style=" margin-top: -140px;">
                <div class="input-field">
                  <h5 >Menu:</h5>
                  <select name="menu[]" multiple>
                    <option value="" disabled selected>Selecione um Menu</option>

                    <?php
                    include('server/conecta.php');
                    $qryLista = "SELECT * FROM menu";
                    $sql = mysql_query($qryLista) or die(mysql_error());
                    
                    if (@mysql_num_rows($sql) == 0){
                      echo 0;
                    }else{
                      while ($resultado = mysql_fetch_array($sql)) { 
                        $vetor[] = $resultado;                    
                    ?>
                    <option value="<?= $resultado['id'] ?>"><?= $resultado['nome'] ?></option>
                    <?php 
                       } 
                    }
                    ?>
                    
                  </select>
                </div>    
              </div>

              <div class="col l12">
                <h5 >Detalhes:</h5>
                <div class="input-field col s12">
                  <textarea name="detalhes">Adicione aqui informações, detalhes, ingredientes e etc..</textarea>
                </div>
              </div>

              
              <div class="col l12 eoq">
                <input type="submit" class="btn grey darken-2 col l4 offset-l4" name="" value="Cadastrar">
              </div>
              
              
            </form>
          </div>


          <!-- GALERIA DE IMAGENS -->
          <div id="test1" class="row ">
            <div class="fotos col l12"  style="margin-top: 50px;">


                <?php 

                include('server/conecta.php');
                $qryLista = "SELECT * FROM tipo";
                $query = mysql_query($qryLista) or die(mysql_error());
                
                
                while ($final = mysql_fetch_array($query)) { 
                
                $id_tipo = $final['id'];
                ?>

                  <div class="row" style="margin-bottom: 50px;">

                  <h3><?= $final['nome']; ?></h3>
                   

                  

                  <?php

                  $qryLista = "SELECT * FROM produto where id_tipo='$id_tipo'";
                  $sql = mysql_query($qryLista) or die(mysql_error());
                  while ($resultado = mysql_fetch_array($sql)) { 
                               
                  ?>


                  <div class="col s12 m6 l3">
                    <div class="card" style="height: 250px !important;">
                      <div class="card-image" >
                        <img src="../img/produtos/<?= $resultado['imagem'] ?>">
                        <span class="card-title"><?= $resultado['nome'] ?></span>
                      </div>
                      <div class="card-action">
                        <form method="post" action="server/deleta_produto.php">
                          <input type="text" name="id" value="<?= $resultado['id'] ?>" style="display: none;">
                          <input id="btnDeleta" class="btn col l6 red white-text"  type="submit" name="botao" value="Apagar">
                        </form>
                        <form method="post" action="editar_produto.php">
                          <input type="text" name="id" value="<?= $resultado['id'] ?>" style="display: none;">
                          <input id="btnDeleta" class="btn col l6 white black-text"  type="submit" name="botao" value="Editar">
                        </form>                      
                      </div>
                    </div>
                  </div>

                  <?php 
                  }
                  ?>
                  </div>
                <?php                   
                }
                ?>


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