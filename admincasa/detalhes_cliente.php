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

include 'server/conecta.php';
$id_cliente = $_GET['id'];


$mudando = "UPDATE user SET novo_user = 1 WHERE id='$id_cliente'";
$vamo = mysql_query($mudando);

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
        <h2 align="center" class="col l9 offset-l1">Detalhes - <?= $dados['nome'] ?> <?= $dados['sobrenome'] ?></h2>

        <!-- Dropdown Trigger -->
        <div class="col l2" style="margin-top: 40px;">
          <a class='dropdown-button btn circle white' href='#' data-activates='dropdown1'> <i class="material-icons black-text">vpn_key</i></a>

          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
          </ul>
        </div>

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
           
          <?php }else{?>

                <div class="col l10 offset-l1 s12 card grey lighten-4" style="padding-bottom: 30px">

                  <div class="col l12 s12" align="center">
                    <h5>Clique em uma das opções para confirmar o pagamento!</h5>
                  </div>
                  <div class="col l12 s12">
                    <a href="server/confirma_boleto.php?id=<?= $dados['id'] ?>" class="btn blue white-text col l4" style="margin-top: 30px">Transferência (DOC)</a>
                    <a href="server/confirma_maquininha.php?id=<?= $dados['id'] ?>" class="btn orange white-text col l4" style="margin-top: 30px">Moderninha</a>
                    <a href="server/confirma_pagseguro.php?id=<?= $dados['id'] ?>" class="btn green white-text col l4" style="margin-top: 30px">PagSeguro</a>
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

            if ($pegou['id_plano'] == 1) {
              $plano = "Quinzenal";
            }elseif ($pegou['id_periodo'] == 2) {
              $plano = "Mensal";
            }else{
              $plano = "Não definido";
            }

            if ($pegou['id_plano'] == 1) {
              $embalagem = "Retornável";
            }elseif ($pegou['id_periodo'] == 2) {
              $embalagem = "Reciclável";
            }else{
              $embalagem = "Não definido";
            }

            if ($pegou['data_pagamento'] == "0000-00-00") {
              $data_pagamento = "Não definido";
            }else{
              $data_pagamento = date('d/m/Y', strtotime($pegou['data_pagamento']));
            }

            
            if ($pegou['forma_pagamento'] == 1) {
              $pagamento = "Transferência (DOC)";
            }elseif ($pegou['forma_pagamento'] == 2) {
              $pagamento = "PagSeguro";
            }elseif ($pegou['forma_pagamento'] == 3) {
              $pagamento = "Moderninha";
            }else{
              $pagamento = "Não definido"; }
        ?>

          <ul class="collapsible" data-collapsible="accordion" style="box-shadow: none;">
            <li>
              <div class="collapsible-header" style="height: 90px; padding-top: 10px;"><h4>Dados do usuário</h4></div>
            </li>
              <li class="collection-item">
                <div class="collapsible-header">Dados Pessoais <i class="material-icons">play_for_work</i></div>
                <div class="collapsible-body grey lighten-4">
                  <p>
                    <ul class="collection grey lighten-4">                        
                      <li class="collection-item"><div>Nome: <?= $pegou['nome'] ?> <?= $pegou['sobrenome'] ?></div></li>
                      <li class="collection-item"><div>Data de nascimento: <?= date('d/m/Y', strtotime($pegou['nascimento'])) ?></div></li>
                      <li class="collection-item"><div>Cidade: <?= $pegou['cidade'] ?></div></li>
                      <li class="collection-item"><div>Bairro: <?= $pegou['bairro'] ?></div></li>
                      <li class="collection-item"><div>Rua: <?= $pegou['rua'] ?></div></li>
                      <li class="collection-item"><div>Número: <?= $pegou['numero'] ?></div></li>
                      <li class="collection-item"><div>Complemento: <?= $pegou['complemento'] ?></div></li>
                      <li class="collection-item"><div>Empresa: <?= $pegou['empresa'] ?></div></li>
                      <li class="collection-item"><div>Departamento: <?= $pegou['departamento'] ?></div></li>
                      <li class="collection-item"><div>CPF: <?= $pegou['cpf'] ?></div></li>
                      <li class="collection-item"><div>Data de cadastro: <?= date('d/m/Y', strtotime($pegou['data_cadastro'])) ?></div></li>
                    </ul>
                  </p>
                </div>
              </li>
              <li class="collection-item">
                <div class="collapsible-header">Dados de Contato <i class="material-icons">play_for_work</i></div>
                <div class="collapsible-body grey lighten-4">
                  <p>
                    <ul class="collection grey lighten-4">                        
                      <li class="collection-item"><div>Ramal: <?= $pegou['ramal'] ?></div></li>
                      <li class="collection-item"><div>Telefone: <?= $pegou['telefone'] ?></div></li>
                      <li class="collection-item"><div>Celular: <?= $pegou['celular'] ?></div></li>
                      <li class="collection-item"><div>Email: <?= $pegou['email'] ?></div></li>      
                    </ul>
                  </p>
                </div>
              </li>
              <li class="collection-item">
                <div class="collapsible-header">Opções do Usuário <i class="material-icons">play_for_work</i></div>
                <div class="collapsible-body grey lighten-4">
                  <p>
                    <ul class="collection">                        
                      <li class="collection-item"><div>Periodo: <?= $periodo ?></div></li>
                      <li class="collection-item"><div>Forma de Pagamento: <?= $pagamento ?></div></li>
                      <li class="collection-item"><div>Data de Pagamento: <?= $data_pagamento ?></div></li>
                      <li class="collection-item"><div>Plano: <?= $plano ?></div></li>
                      <li class="collection-item"><div>Embalagem: <?= $embalagem ?></div></li>         
                    </ul>
                  </p>
                </div>
              </li> 
          </ul>


          <div class="col l12">
            <a class="btn blue white-text col l6 offset-l3" href="server/gerar_pdf.php?id=<?= $id_cliente ?>">Gerar Relatório</a>
          </div>
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
              <p>Adicionado à lista de favoritos!
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