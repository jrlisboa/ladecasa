<?php
include "../server/conecta.php";
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}
$id_user = $_SESSION['usuarioID'];
$seleciona = "SELECT * FROM user WHERE id = '$id_user'";
$vai = mysql_query($seleciona) or die(mysql_error());
$dado = mysql_fetch_array($vai);

$_SESSION['pagamento']=$dado['pagamento'];
$_SESSION['boleto']=$dado['boleto'];

if (date('Y/m/d', time()) > date('Y/m/d', strtotime("+15 days",strtotime($dado['data_pagamento'])))) {
  $seleciona = "UPDATE user SET pagamento = 0 WHERE id = '$id_user' ";
  $vai = mysql_query($seleciona) or die(mysql_error());
  $_SESSION['pagamento'] = 0;
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
      <title>Dashboard | Lá de Casa</title>

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
                  <li><a class="loginBtn btn" href="../server/logout.php">Sair</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../server/logout.php">Sair</a></li>
                </ul>
              </div>
            </nav>
          </div>




          <ul class="side-nav fixed col l2" >
            <li class="foto">
                <img id="abreEditar" class="visualizar imagemPerfil circle col l9 offset-l2 s10" src="../img/perfil/<?= $_SESSION['imagem'] ?>">
            </li>
            <li>
              <h5 class="white-text center"><?= $_SESSION['nomeUsuario'] ?> <?= $_SESSION['sobrenome'] ?></h5>
            </li>

            <?php
            if ($_SESSION['pagamento'] == 0) {
            ?>
            <li>
              <div class="btnNovoPedido"><a href="../pagamento/" class="btn-small col l10 offset-l1">Pagamento</a></div>
            </li>
            <?php }else{ ?>
            <li>
              <div class="btnNovoPedido"><a href="../favoritos" class="btn-small col l10 offset-l1">Favoritos</a></div>
            </li>
            <?php } ?>
            
            <li class="categoriaSide card firstCard grey darken-4 white-text row">
              <span class="col l12 s12 tituloEditaveis">Rua:</span>
              <span class="col l12 s12 editaveis"><?= $_SESSION['rua'] ?></span>

              <span class="col l12 s12 tituloEditaveis">Email:</span>
              <span class="col l12 s12 editaveis" id="limitarEmail"><?= $_SESSION['email'] ?></span>

              <span class="col l12 s12 tituloEditaveis">Empresa:</span>
              <span class="col l12 s12 editaveis"><?= $_SESSION['empresa'] ?></span>

              <a id="abreEditarInfo" class="btn-small grey darken-3 white-text col l12 s12 editar">Editar</a>
            </li>
            
          </ul>   


          <div class="col l10 offset-l2 s12 container row menus conteudoDash">

            <?php
            if ($_SESSION['pagamento'] == 0) {
                if ($_SESSION['boleto'] == 0) {
            ?>

            <div class="row">
              <div class="col s12">
                <div class="card yellow darken-2 cardPagamento" align="center">
                  <div class="card-content" style="height: 200px !important;">
                  <span class="card-title white-text">Olá <?= $_SESSION['nomeUsuario'] ?>, configure suas opções de pagamento!</span>
                    
                    <span class="white-text col l8" style="margin-top: 20px;">Agora você faz parte do Lá de Casa, oferecemos diversas opções de menus e produtos para que você possa se deliciar e ainda cuidar da sua saúde, configure suas opçõoes de pagamento para começar a receber nosso produtos no seu escritório! :)
                    </span>

                    <img style="margin-top: 5px" class="col l2 offset-l1" src="../img/icones/credit-card.svg">
                  </div>
                  <div class="card-action">
                    <a class="white-text" href="../pagamento/">Vamos lá!</a>
                  </div>
                </div>
              </div>
            </div>

            <?php }else{ ?>

            <div class="row">
              <div class="col s12">
                <div class="card yellow darken-2 cardPagamento" align="center">
                  <div class="card-content" style="height: 200px !important;">
                  <span class="card-title white-text"><?= $_SESSION['nomeUsuario'] ?>, seu boleto foi gerado!</span>
                    
                    <span class="white-text col l8" style="margin-top: 20px;">Agora é bem simples, basta pagar antes do vencimento e faremos a verificação, depois disso, você já poderá aproveitar nossos serviços.<br>Caso queira gerar outro boleto clique no botão "Pagamento" da barra lateral!
                    </span>

                    <img style="margin-top: 5px" class="col l2 offset-l1" src="../img/icones/invoice.svg">
                  </div>
                  <!--<div class="card-action">
                    <a class="white-text" href="../pagamento/">Vamos lá!</a>
                  </div>-->
                </div>
              </div>
            </div>

            <?php }} ?>

            <div class=" col l12 plano primeiroPlano">
              <div class="tituloMenus tituloDash" align="left">
                <h4>Meu Plano:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnPlano btnDash">

              <?php

                  if ($_SESSION['plano'] == 1) {
                    ?>
                    <a href="../server/altera_plano.php?id=1">
                      <div class="btnItem selectDash btnItemDash primeiroBtn col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </a>

                    <a href="../server/altera_plano.php?id=2">
                      <div class="btnItem btnItemDash col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </a>
                    <?php
                  }elseif ($_SESSION['plano'] == 2){

                    ?>
                    <a href="../server/altera_plano.php?id=1">
                      <div class="btnItem btnItemDash primeiroBtn col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </a>

                    <a href="../server/altera_plano.php?id=2">
                      <div class="btnItem selectDash btnItemDash col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </a>


                  <?php
                  }else{

                  ?>


                    <a href="../server/altera_plano.php?id=1">
                      <div class="btnItem btnItemDash primeiroBtn col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </a>

                    <a href="../server/altera_plano.php?id=2">
                      <div class="btnItem btnItemDash col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </a>

                  <?php
                  }
               ?>
             
              </div>
            </div>


            <div class=" col l12 plano">
              <div class="tituloMenus tituloDash" align="left">
                <h4>Meu Período:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnPlano btnDash">

              <?php

                  if ($_SESSION['periodo'] == 1) {
                    ?>

                    <a href="../server/altera_periodo.php?id=1">
                      <div class="btnItem selectDash btnItemDash primeiroBtn col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/am.svg"></div>
                        <span class="col l12 s12">Durante a Manhã</span>
                      </div>
                    </a>                

                    <a href="../server/altera_periodo.php?id=2">
                      <div class="btnItem btnItemDash col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/pm.svg"></div>
                        <span class="col l12 s12">Durante a Tarde</span>
                      </div>
                    </a>

                    <?php
                  }elseif ($_SESSION['periodo'] == 2){

                    ?>

                    <a href="../server/altera_periodo.php?id=1">
                      <div class="btnItem btnItemDash primeiroBtn col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/am.svg"></div>
                        <span class="col l12 s12">Durante a Manhã</span>
                      </div>
                    </a>

                    <a href="../server/altera_periodo.php?id=2">
                      <div class="btnItem selectDash btnItemDash col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/pm.svg"></div>
                        <span class="col l12 s12">Durante a Tarde</span>
                      </div>
                    </a>

                    <?php
                  }else{
                    ?>

                    <a href="../server/altera_periodo.php?id=1">
                      <div class="btnItem btnItemDash primeiroBtn col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/am.svg"></div>
                        <span class="col l12 s12">Durante a Manhã</span>
                      </div>
                    </a>

                    <a href="../server/altera_periodo.php?id=2">
                      <div class="btnItem btnItemDash col l6 s12">
                        <div class="col l12 s12"><img src="../img/icones/pm.svg"></div>
                        <span class="col l12 s12">Durante a Tarde</span>
                      </div>
                    </a>
                  <?php
                  }
                    ?>
           
              </div>
            </div>


            <div class="col l12 containerMenu">
              <div class="tituloMenus tituloDash" align="left">
                <h4>Meu Menu:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnDash menuDash row">

                <?php

                  $sql = "SELECT * FROM menu";
                  $query = mysql_query($sql);
                  while ($res = mysql_fetch_array($query)) {
                    
                    if ($res['id'] == $_SESSION['menu']) {
                ?>

                      <a href="../server/altera_menu.php?id=<?= $res['id'] ?>" class="col l3 s12 linkMenu" id="selectMenu">
                        <div class="btnItem selectDash btnItemDash">
                          <div class="col l12 s12"><img src="../img/icones/ilimitado.svg"></div>
                          <span class="col l12 s12">Menu <?= $res['nome'] ?></span>
                        </div>
                      </a>

                <?php

                    }else{

                ?>

                      <input type="text" name="id" id="idMenu" value="<?= $res['id'] ?>" hidden>

                      <a href="../server/altera_menu.php?id=<?= $res['id'] ?>" class="col l3 s12 linkMenu" id="selectMenu">
                        <div class="btnItem btnItemDash">
                          <div class="col l12 s12"><img src="../img/icones/ilimitado.svg"></div>
                          <span class="col l12 s12">Menu <?= $res['nome'] ?></span>
                        </div>
                      </a>

                <?php

                    }
                  }
                ?>


              </div>
            </div>
          </div>

          <!-- MODAL PARA EDITAR IMAGEM DE PERFIL -->
          <div id="editarImagem" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4 class="modalTitulo">Editar imagem de perfil</h4>

              <div class="modalPerfil col l12 s12">
                <img id="visualizar" class="col l5 s12 visualizar" src="../img/perfil/<?= $_SESSION['imagem'] ?>">

                <form id="formulario" method="post" enctype="multipart/form-data" action="../server/upload.php">
                  <div class="col l6 offset-l1">
                    <span class="col l12 s12">Clique abaixo para adicionar uma nova imagem de perfil!</span>

                    <div class="col l12 s12">
                      <label for='selecao-arquivo'>Selecionar uma foto &#187;</label>
                      <input id='selecao-arquivo' type='file' name="imagem">
                    </div>

                    <div class="col l12 s12">
                      <input class="btnBottom btnAlteraImagem col l6 s12" type="submit" name="" value="Alterar Imagem">
                    </div>
                    
                  </div>  
                </form>
                
              </div>          
            </div>

            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
            </div>
          </div>


            <!-- MODAL PARA EDITAR INFORMAÇÕES -->
            <div id="editarInfo" class="modal modal-fixed-footer">
              <div class="modal-content">
                <h4 class="modalTitulo">Editar informações de perfil</h4>

                <div class="modalPerfil col l12 s12">
                  <form id="cadUsuario" action="../server/edita_info.php" class="row" method="post">

                  <div class="col l6">
                    <span>Nome:</span>
                    <input type="text" name="nome" id="nome" required value="<?= $_SESSION['nomeUsuario'] ?>">

                    
                    <span>Email:</span>
                    <input disabled type="text" name="email" id="email" required value="<?= $_SESSION['email'] ?>">

                    <span>CPF:</span>
                    <input disabled type="text" name="cpf" id="cpf" required value="<?= $_SESSION['cpf'] ?>">

                    <span>Cidade do escritório:</span>
                    <input type="text" name="cidade" id="end_escritorio" required value="<?= $_SESSION['cidade'] ?>">

                    <span>Bairro do escritório:</span>
                    <input type="text" name="bairro" id="end_escritorio" required value="<?= $_SESSION['bairro'] ?>">

                    <span>Rua do escritório:</span>
                    <input type="text" name="rua" id="end_escritorio" required value="<?= $_SESSION['rua'] ?>">

                  </div>

                  <div class="col l6">
                  <span>Sobrenome:</span>
                    <input type="text" name="sobrenome" id="sobrenome" required value="<?= $_SESSION['sobrenome'] ?>">

                    <span>Data de nascimento:</span>
                    <input type="date" name="nascimento" id="idade" required value="<?= $_SESSION['nascimento'] ?>">

                    <span>Nome da Empresa:</span>
                    <input type="text" name="empresa" id="empresa" required value="<?= $_SESSION['empresa'] ?>">

                    <span>Número do escritório:</span>
                    <input type="text" name="numero" id="end_escritorio" required value="<?= $_SESSION['numero'] ?>">

                    <span>Complemento: (Opcional)</span>
                    <input type="text" name="complemento" id="end_escritorio" value="<?= $_SESSION['complemento'] ?>">

                    <span>Telefone:</span>
                    <input type="text" name="telefone" id="end_escritorio" required value="<?= $_SESSION['telefone'] ?>">

                  </div>

                  <div class="col l12">
                    

                    <span>Ramal:</span>
                    <input type="text" name="ramal" id="end_escritorio" required value="<?= $_SESSION['ramal'] ?>">

                    <input id="salvarEdit" class="col l6 offset-l3 salvarEdit" type="submit" name="enviar" value="Salvar">
                  </div>                 

                  
                </form>
                  
                </div>          
              </div>

              <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
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

        $('#abreEditar').click(function(){
          $('#editarImagem').openModal();
        });

        $('#abreEditarInfo').click(function(){
          $('#editarInfo').openModal();
        });

        $('input[type=file]').change(function() {
           $('label').text("Arquivo Selecionado");
        });



      </script>
    </body>
  </html>