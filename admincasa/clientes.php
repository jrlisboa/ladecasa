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
              <li><a href="notinha.php">Notinha</a></li>
              <li><a href="sistema.php">Sistema</a></li>
              <li><a href="dicas.php">Dicas</a></li>
              <li><a class="btn white black-text" href="server/logout.php">Sair</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="produtos.php">Produtos</a></li>
              <li><a href="clientes.php">Clientes</a></li>
              <li><a href="notinha.php">Notinha</a></li>
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
          <a href="server/excel.php" class="btn blue white-text col l4 offset-l4">Download planilha de clientes</a>
        </div>

        <form class="row" method="get" action="busca_clientes.php">
          <select class="col l2 offset-l2" name="tipo_busca">
            <option value="" disabled selected>Tipo de busca</option>
            <option value="0">Buscar por Nome</option>
            <option value="1">Buscar por CPF</option>
          </select>

          <div class="input-field col l4" style="margin-top: 0px;">
            <input id="first_name" type="text" class="validate" name="busca">
            <label for="first_name">Pesquisar</label>
          </div>
          
          <input style="margin-top: 10px; margin-left: 20px;" type="submit" class="btn blue white-text col l2 " name="buscar" value="Buscar">
        </form>        

        <div class="row">

          <table class="striped">
            <thead>
              <tr>
                  <th data-field="id">Novo</th>
                  <th data-field="id">Ativo</th>
                  <th data-field="id">Nome</th>
                  <th data-field="price">Email</th>
                  <th data-field="price">CPF</th>
                  <th data-field="name">Vencimento</th>
                  <th data-field="price">Pendências</th>
                  <th data-field="price">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php 

              include('server/conecta.php');

              $qryLista = "SELECT * FROM user ORDER BY id DESC";
              $sql = mysql_query($qryLista) or die(mysql_error());
              while ($resultado = mysql_fetch_array($sql)) {

                if ($resultado['novo_user'] == 0) {
                  $novo = "<div style='height: 30px; width: 30px;' class='chip green'><i class='material-icons' style='font-size: 20px; margin-top: 5px; margin-left: -6px; color: white'>add</i></div>";
                }else{
                  $novo = "";
                }

                if ($resultado['id_plano'] == 1) {

                  $vencido = date('Y/m/d', time()) > date('Y/m/d', strtotime("+14 days",strtotime($resultado['data_pagamento'])));

                }elseif ($resultado['id_plano']== 2){
                  $vencido = date('Y/m/d', time()) > date('Y/m/d', strtotime("+30 days",strtotime($resultado['data_pagamento'])));
                }

                if ($resultado['pagamento'] == 1) {
                  $dataPagamento = date('d/m/Y', strtotime($resultado['data_pagamento']));
                }else{
                  $dataPagamento = "Nulo";
                }

                if ($resultado['ativo'] == 1) {
                  $ativo = "<div style='height: 30px; width: 30px;' class='chip orange' class='tooltipped' data-position='top' data-delay='50' data-tooltip='Clique para desativar.'><i class='material-icons' style='font-size: 20px; margin-top: 5px; margin-left: -6px; color: white'>done</i></div>";
                }else{
                  $ativo = "";
                }

                if ($resultado['pagamento'] == 1){ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $ativo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td><?php
                    if ($vencido == true) {
                      if ($dataPagamento == "Nulo") {
                        echo $dataPagamento;
                      }else{
                        echo '<div class="red white-text center">'.$dataPagamento.'</div>';
                      }
                    }else{
                      echo $dataPagamento;
                    }
                    ?>
                    </td>
                    <td><div class="green white-text center">Pagamento em dia</div></td>
                    <td>
                      <a href="detalhes_cliente.php?id=<?= $resultado['id'] ?>" class="btn-small blue white-text col l12 center">Detalhes</a>                  
                    </td>
                  </tr>                

                  <?php }elseif ($resultado['maquininha'] == 1){ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $ativo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td><?php
                    if ($vencido == true) {
                      if ($dataPagamento == "Nulo") {
                        echo $dataPagamento;
                      }else{
                        echo '<div class="red white-text center">'.$dataPagamento.'</div>';
                      }
                    }else{
                      echo $dataPagamento;
                    }
                    ?>
                    </td>
                    <td ><div class="orange white-text center">Maquininha Solicitada</div></td>
                    <td>
                      <a href="detalhes_cliente.php?id=<?= $resultado['id'] ?>" class="btn-small blue white-text col l12 center">Detalhes</a>
                    </td>
                  </tr>

                  <?php }elseif ($resultado['pagseguro'] == 1){ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $ativo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td><?php
                    if ($vencido == true) {
                      if ($dataPagamento == "Nulo") {
                        echo $dataPagamento;
                      }else{
                        echo '<div class="red white-text center">'.$dataPagamento.'</div>';
                      }
                    }else{
                      echo $dataPagamento;
                    }
                    ?>
                    </td>
                    <td ><div class="teal white-text center">PagSeguro pendente</div></td>
                    <td>
                      <a href="detalhes_cliente.php?id=<?= $resultado['id'] ?>" class="btn-small blue white-text col l12 center">Detalhes</a>                  
                    </td>
                  </tr>

                  <?php }else{ ?>

                  <tr>
                    <td><?= $novo ?></td>
                    <td><?= $ativo ?></td>
                    <td><?= $resultado['nome'] ?></td>
                    <td><?= $resultado['email'] ?></td>
                    <td><?= $resultado['cpf'] ?></td>
                    <td><?php
                    if ($vencido == true) {
                      if ($dataPagamento == "Nulo") {
                        echo $dataPagamento;
                      }else{
                        echo '<div class="red white-text center">'.$dataPagamento.'</div>';
                      }
                    }else{
                      echo $dataPagamento;
                    }
                    ?>
                    </td>
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

          $('select').material_select();

          $('input[type=file]').change(function() {
             $('label').text("Arquivo Selecionado");
          });
        });
      </script>
    </body>
  </html>