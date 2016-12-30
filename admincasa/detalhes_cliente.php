<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: index.php"); exit; //Redireciona o visitante para login
}

include 'server/conecta.php';
$id_cliente = $_GET['id'];
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
        <?php
        $sql = "SELECT * FROM user WHERE id='$id_cliente'";
        $query = mysql_query($sql) or die(mysql_error());
        $dados = mysql_fetch_array($query);
        error_reporting(0);
        ?>
        <h2 align="center">Detalhes - <?= $dados['nome'] ?> <?= $dados['sobrenome'] ?></h2>

        <div class="row">

          <?php
          if ($dados['pagamento'] == 1) { ?>

                <div class="col l10 offset-l1 s12 card grey lighten-4" style="padding-bottom: 30px">

                <div class="col l6 s12" align="right">
                  <h5>Encerrar serviços à este usuário?</h5>
                </div>
                <div class="col l6 s12">
                  <a href="server/cancelar_acesso.php?id=<?= $dados['id'] ?>" class="btn blue white-text" style="margin-top: 30px">Cancelar acesso</a>
                </div>
                  
                </div>        
           
          <?php }elseif ($dados['boleto'] == 1) {?>

                <div class="col l10 offset-l1 s12 card grey lighten-4" style="padding-bottom: 30px">

                <div class="col l6 s12" align="right">
                  <h5>Pagamento do boleto aprovado?</h5>
                </div>
                <div class="col l6 s12">
                  <a href="server/confirma_boleto.php?id=<?= $dados['id'] ?>" class="btn blue white-text" style="margin-top: 30px">Confirmar pagamento</a>
                </div>
                  
                </div>

          <?php }elseif ($dados['pagseguro'] == 1) {?>

                <div class="col l10 offset-l1 s12 card grey lighten-4" style="padding-bottom: 30px">

                <div class="col l6 s12" align="right">
                  <h5>Assinatura PagSeguro aprovada?</h5>
                </div>
                <div class="col l6 s12">
                  <a href="server/confirma_pagseguro.php?id=<?= $dados['id'] ?>" class="btn blue white-text" style="margin-top: 30px">Confirmar pagamento</a>
                </div>
                  
                </div>      

          <?php }else{ ?>

          <div class="col l8 offset-l2 s12 card grey lighten-4" style="padding-bottom: 30px">

            <div class="col l12 s12" align="center">
              <h5>Este usuário não possui nenhuma pendência!</h5>
            </div>
          </div>

          <?php } ?>

        </div>




        <div class="print" id="printable">

        <div class="col l6 s12">

        <?php
            $selec = "SELECT * FROM user WHERE id = '$id_cliente'";
            $vaila = mysql_query($selec);
            $pegou = mysql_fetch_array($vaila);

            if ($pegou['id_periodo'] == 1) {
              $periodo = "Manhã";
            }elseif ($pegou['id_periodo'] == 2) {
              $periodo = "Tarde";
            }else{
              $periodo = "Não definido";
            }

            if ($pegou['forma_pagamento'] == 1) {
              $pagamento = "Boleto Bancário";
            }elseif ($pegou['forma_pagamento'] == 2) {
              $pagamento = "PagSeguro";
            }else{
              $pagamento = "Não definido"; }
        ?>

          <ul class="collection with-header">
            <li class="collection-header"><h4>Dados do usuário</h4></li>
            <li class="collection-item"><div>Nome: <?= $pegou['nome'] ?> <?= $pegou['sobrenome'] ?></div></li>
            <li class="collection-item"><div>Data de nascimento: <?= $pegou['nascimento'] ?></div></li>
            <li class="collection-item"><div>Telefone: <?= $pegou['telefone'] ?></div></li>
            <li class="collection-item"><div>Ramal: <?= $pegou['ramal'] ?></div></li>
            <li class="collection-item"><div>Cidade: <?= $pegou['cidade'] ?></div></li>
            <li class="collection-item"><div>Bairro: <?= $pegou['bairro'] ?></div></li>
            <li class="collection-item"><div>Rua: <?= $pegou['rua'] ?></div></li>
            <li class="collection-item"><div>Número: <?= $pegou['numero'] ?></div></li>
            <li class="collection-item"><div>Complemento: <?= $pegou['complemento'] ?></div></li>
            <li class="collection-item"><div>Empresa: <?= $pegou['empresa'] ?></div></li>
            <li class="collection-item"><div>CPF: <?= $pegou['cpf'] ?></div></li>
            <li class="collection-item"><div>Email: <?= $pegou['email'] ?></div></li>
            <li class="collection-item"><div>Periodo: <?= $periodo ?></div></li>
            <li class="collection-item"><div>Forma de Pagamento: <?= $pagamento ?></div></li>              
          </ul>
        </div>


        <div class="col l6 s12">
          
          <ul class="collection">
            <li class="collection-header"><h4 style="margin-left: 20px">Favoritos</h4></li>
            <?php
              $select = "SELECT * FROM favorito
              INNER JOIN produto ON (produto.id = favorito.id_produto) WHERE id_user='$id_cliente'";
              $vamola = mysql_query($select);
              while($lista = mysql_fetch_array($vamola)){
            ?>

            <li class="collection-item avatar">
              <img src="../img/produtos/<?= $lista['imagem'] ?>" alt="" class="circle">
              <span class="title" style="font-weight: 600"><?= $lista['nome'] ?></span>
              <p><?= $lista['detalhes'] ?>
              </p>
              
            </li>

            <?php } ?>
            
          </ul>
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

          $('input[type=file]').change(function() {
             $('label').text("Arquivo Selecionado");
          });
        });
      </script>
    </body>
  </html>