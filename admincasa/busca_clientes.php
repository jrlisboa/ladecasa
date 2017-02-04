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

error_reporting(0);
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
        <h2 align="center">Clientes</h2>

        <div class="row">
          <a href="clientes.php" class="btn blue white-text col l4 offset-l4">Ver todos os clientes!</a>
        </div>

        <div class="row">

          <table class="striped">
            <thead>
              <tr>
                  <th data-field="id">Novo</th>
                  <th data-field="id">Nome</th>
                  <th data-field="name">Telefone</th>
                  <th data-field="price">Email</th>
                  <th data-field="price">CPF</th>
                  <th data-field="price">Pendências</th>
                  <th data-field="price">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php 

              include('server/conecta.php');
              $tipo_busca = $_GET['tipo_busca'];
              $busca = $_GET['busca'];

              if ($tipo_busca == 0) {
                $qryLista = "SELECT * FROM user WHERE nome LIKE '%".$busca."%' ORDER BY id DESC";
                $sql = mysql_query($qryLista) or die(mysql_error());
              }else{
                $qryLista = "SELECT * FROM user WHERE cpf LIKE '%".$busca."%' ORDER BY id DESC";
                $sql = mysql_query($qryLista) or die(mysql_error());
              }
              
              while ($resultado = mysql_fetch_array($sql)) {

                if ($resultado['novo_user'] == 0) {
                  $novo = "<div style='height: 30px; width: 30px;' class='chip green'><i class='material-icons' style='font-size: 20px; margin-top: 5px; margin-left: -6px; color: white'>add</i></div>";
                }else{
                  $novo = "";
                }

                if ($resultado['pagamento'] == 1){ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['telefone'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td><div class="green white-text center">Pagamento em dia</div></td>
                    <td>
                      <a href="detalhes_cliente.php?id=<?= $resultado['id'] ?>" class="btn-small blue white-text col l12 center">Detalhes</a>                  
                    </td>
                  </tr>                

                  <?php }elseif ($resultado['pagseguro'] == 1){ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['telefone'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td ><div class="teal white-text center">PagSeguro pendente</div></td>
                    <td>
                      <a href="detalhes_cliente.php?id=<?= $resultado['id'] ?>" class="btn-small blue white-text col l12 center">Detalhes</a>                  
                    </td>
                  </tr>

                  <?php }else{ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['telefone'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td></td>
                    <td>
                      <a href="detalhes_cliente.php?id=<?= $resultado['id'] ?>" class="btn-small blue white-text col l12 center">Detalhes</a>                  
                    </td>
                  </tr> 

              <?php }} ?>

            </tbody>
          </table>

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