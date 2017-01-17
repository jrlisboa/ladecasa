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

$_SESSION['forma_pagamento']=$dado['forma_pagamento'];
$_SESSION['pagamento']=$dado['pagamento'];


if ($_SESSION['plano']== 1) {
  if (date('Y/m/d', time()) > date('Y/m/d', strtotime("+15 days",strtotime($dado['data_pagamento'])))) {
    $seleciona = "UPDATE user SET pagamento = 0, forma_pagamento = 0, pagseguro = 0 WHERE id = '$id_user' ";
    $vai = mysql_query($seleciona) or die(mysql_error());
    $_SESSION['pagamento'] = 0;
  }
}elseif ($_SESSION['plano']== 2){
  if (date('Y/m/d', time()) > date('Y/m/d', strtotime("+30 days",strtotime($dado['data_pagamento'])))) {
    
    $seleciona = "UPDATE user SET pagamento = 0, forma_pagamento = 0, pagseguro = 0 WHERE id = '$id_user' ";
    $vai = mysql_query($seleciona) or die(mysql_error());
    $_SESSION['pagamento'] = 0;
  }
}


?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/introjs.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="../css/style.css"  />
      <title>Dashboard | Lá de Casa</title>

      <meta charset="utf-8">

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

      <div class="tudo tudoDash row">

          <div class="navbar-fixed dashMobile">
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
                <ul class="side-nav sideDash" id="mobile-demo">
                  <li class="foto">
                      <img class="abreEditar imagemPerfil circle col l9 offset-l2 s6 offset-s3" src="../img/perfil/<?= $_SESSION['imagem'] ?>">
                  </li>
                  <li>
                    <div class="hehezinho"><h5 class="white-text center"><?= $_SESSION['nomeUsuario'] ?> <?= $_SESSION['sobrenome'] ?></h5></div>
                  </li>

                  <?php
                  if ($_SESSION['pagamento'] == 0) {
                  ?>
                  <li>
                    <div class="btnNovoPedido"><a href="../pagamento/" class="btn-small col l10 offset-l1 s10 offset-s1">Pagamento</a></div>
                  </li>
                  <?php }else{ ?>
                  <li>
                    <div class="btnNovoPedido"><a href="../favoritos" class="btn-small col l10 offset-l1 s10 offset-s1">Favoritos</a></div>
                  </li>
                  <?php } ?>
                  
                  <li class="categoriaSide card firstCard grey darken-4 white-text row">
                    <span class="col l12 s12 tituloEditaveis">Rua:</span>
                    <span class="col l12 s12 editaveis"><?= $_SESSION['rua'] ?></span>

                    <span class="col l12 s12 tituloEditaveis">Email:</span>
                    <span class="col l12 s12 editaveis" id="limitarEmail"><?= $_SESSION['email'] ?></span>

                    <span class="col l12 s12 tituloEditaveis">Empresa:</span>
                    <span class="col l12 s12 editaveis"><?= $_SESSION['empresa'] ?></span>

                    <a class="abreEditarInfo btn-small grey darken-3 white-text col l12 s12 editar">Editar</a>
                  </li>
                  <li><a class="loginBtn btn" href="../server/logout.php">Sair</a></li>
                </ul>
              </div>
            </nav>
          </div>




          <ul class="side-nav fixed col l2 sideResp" >
            <li class="foto">
                <img class="abreEditar visualizar imagemPerfil circle col l9 offset-l2 s10" src="../img/perfil/<?= $_SESSION['imagem'] ?>">
            </li>
            <li>
              <h5 class="white-text center"><?= $_SESSION['nomeUsuario'] ?> <?= $_SESSION['sobrenome'] ?></h5>
            </li>
            <li>
              <div class="btnNovoPedido"><a href="../favoritos" class="btn-small col l10 offset-l1">Favoritos</a></div>
            </li>
            
            <li class="categoriaSide card firstCard grey darken-4 white-text row">
              <span class="col l12 s12 tituloEditaveis">Rua:</span>
              <span class="col l12 s12 editaveis"><?= $_SESSION['rua'] ?></span>

              <span class="col l12 s12 tituloEditaveis">Email:</span>
              <span class="col l12 s12 editaveis" id="limitarEmail"><?= $_SESSION['email'] ?></span>

              <span class="col l12 s12 tituloEditaveis">Empresa:</span>
              <span class="col l12 s12 editaveis"><?= $_SESSION['empresa'] ?></span>

              <a class="abreEditarInfo btn-small grey darken-3 white-text col l12 s12 editar">Editar</a>
            </li>
            
          </ul>   


          <div class="col l10 offset-l2 s12 container row menus conteudoDash">            

            <?php
            if ($_SESSION['pagamento'] == 0) { ?>

            <div class="row">
              <div class="col s10 offset-s1 l12">
                <div class="card yellow darken-2 cardPagamento" align="center">

                <?php
                  if ($_SESSION['plano'] == 0 | $_SESSION['menu'] == 0 | $_SESSION['periodo'] == 0 | $_SESSION['embalagem'] == 0) { ?>

                    <div class="card-content tamanhoCard">
                      <span class="card-title white-text">Olá <?= $_SESSION['nomeUsuario'] ?>, configure suas opções do sistema!</span>
                      
                      <span class="white-text col l8" style="margin-top: 20px;">Agora você faz parte do Lá de Casa, oferecemos diversas opções de menus e produtos para que você possa se deliciar e ainda cuidar da sua saúde, configure suas opções de pagamento para começar a receber nosso produtos no seu escritório! :)
                      </span>

                      <img style="margin-top: 5px" class="col l2 offset-l1 s4 offset-s4" src="../img/icones/settings.svg">
                    </div>
                    <div class="card-action dashAction">                    
                      <a class="white-text" style="cursor: pointer;" onclick="javascript:introJs().start();">Saiba Mais!</a>
                    </div>

                   <?php }else{ ?>

                    <div class="card-content tamanhoCard">
                      <span class="card-title white-text">Olá <?= $_SESSION['nomeUsuario'] ?>, configure suas opções de pagamento!</span>
                      
                      <span class="white-text col l8" style="margin-top: 20px;">Agora você faz parte do Lá de Casa, oferecemos diversas opções de menus e produtos para que você possa se deliciar e ainda cuidar da sua saúde, configure suas opçõoes de pagamento para começar a receber nosso produtos no seu escritório! :)
                      </span>

                      <img style="margin-top: 5px" class="col l2 offset-l1 s4 offset-s4" src="../img/icones/credit-card.svg">
                    </div>
                    <div class="card-action dashAction">                    
                      <a class="white-text" href="../pagamento/">Formas de Pagamento!</a>
                    </div>

                   <?php } ?>
                </div>
              </div>
            </div>

            <?php } ?>


            <?php

              $selectao = "SELECT * FROM favorito WHERE id_user = '$id_user'";
              $vamola = mysql_query($selectao);
              if (@mysql_num_rows($vamola) == 0){
                if ($_SESSION['pagamento'] == 1) { ?>

                <div class="row">
                  <div class="col s10 offset-s1 l12">
                    <div class="card yellow darken-2 cardPagamento" align="center">
                      <div class="card-content tamanhoCard">
                      <span class="card-title white-text col s12 l12">Escolha seus favoritos!</span>
                        
                        <span class="white-text col l8 s12" style="margin-top: 20px;">Seu plano já está ativo, aproveite nossos serviços clicando no botão FAVORITOS abaixo da sua foto de perfil e selecione os produtos que deseja receber!
                        </span>

                        <img style="margin-top: 5px" class="col l2 offset-l1 s4 offset-s4" src="../img/icones/list.svg">
                      </div>
                      <!--<div class="card-action">
                        <a class="white-text" href="../pagamento/">Vamos lá!</a>
                      </div>-->
                    </div>
                  </div>
                </div>
                
            <?php } } ?>



            <div class=" col l12 plano primeiroPlano" >
              <div class="tituloMenus tituloDash" align="left">
                <h4>Meu Plano:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnPlano btnDash" data-step="1" data-intro="Selecione o plano que deseja utilizar, e lembre-se, o plano só pode ser alterado enquanto seu pagamento não estiver ativo, após pagar, você deverá esperar o período de 15 ou 30 dias para fazer a alteração!" data-position='top'>

              <?php

                if ($_SESSION['pagamento'] == 1) { 
                  if ($_SESSION['plano'] == 1) {?>
                    
                    <div class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash" onclick="Materialize.toast('Você só pode alterar seu plano após o final do período atual!', 4000)">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </div>

                    <div class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash" onclick="Materialize.toast('Você só pode alterar seu plano após o final do período atual!', 4000)">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </div>

                    <?php
                  }elseif ($_SESSION['plano'] == 2){ ?>

                    
                    <div class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash" onclick="Materialize.toast('Você só pode alterar seu plano após o final do período atual!', 4000)">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </div>

                    <div class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash" onclick="Materialize.toast('Você só pode alterar seu plano após o final do período atual!', 4000)">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </div>


                  <?php
                  } ?>


                <?php }else{ 
                  if ($_SESSION['plano'] == 1) { ?>
                    
                    <a href="../server/altera_plano.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </a>

                    <a href="../server/altera_plano.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </a>
                    
                  <?php }elseif ($_SESSION['plano'] == 2){ ?>

                    
                    <a href="../server/altera_plano.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </a>

                    <a href="../server/altera_plano.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </a>


                  <?php
                  }else{

                  ?>


                    <a href="../server/altera_plano.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/15.svg"></div>
                        <span class="col l12 s12">Plano Quinzenal</span>
                      </div>
                    </a>

                    <a href="../server/altera_plano.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/31.svg"></div>
                        <span class="col l12 s12">Plano Mensal</span>
                      </div>
                    </a>

                  <?php
                  }}
               ?>
             
              </div>
            </div>


            <div class=" col l12 plano">
              <div class="tituloMenus tituloDash" align="left">
                <h4>Meu Período:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnPlano btnDash" data-step="2" data-intro="Selecione o período que deseja utilizar, assim nossa equipe saberá em qual momento do dia você deseja receber os produtos!" data-position='top'>

              <?php

                  if ($_SESSION['periodo'] == 1) {
                    ?>

                    <a href="../server/altera_periodo.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/am.svg"></div>
                        <span class="col l12 s12">Durante a Manhã</span>
                      </div>
                    </a>                

                    <a href="../server/altera_periodo.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/pm.svg"></div>
                        <span class="col l12 s12">Durante a Tarde</span>
                      </div>
                    </a>

                    <?php
                  }elseif ($_SESSION['periodo'] == 2){

                    ?>

                    <a href="../server/altera_periodo.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/am.svg"></div>
                        <span class="col l12 s12">Durante a Manhã</span>
                      </div>
                    </a>

                    <a href="../server/altera_periodo.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/pm.svg"></div>
                        <span class="col l12 s12">Durante a Tarde</span>
                      </div>
                    </a>

                    <?php
                  }else{
                    ?>

                    <a href="../server/altera_periodo.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/am.svg"></div>
                        <span class="col l12 s12">Durante a Manhã</span>
                      </div>
                    </a>

                    <a href="../server/altera_periodo.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/pm.svg"></div>
                        <span class="col l12 s12">Durante a Tarde</span>
                      </div>
                    </a>
                  <?php
                  }
                    ?>
           
              </div>
            </div>


            <div class=" col l12 plano">
              <div class="tituloMenus tituloDash" align="left">
                <h4>Minha Embalagem:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnPlano btnDash" data-step="3" data-intro="Selecione o tipo de embalagem para que a entrega fique ainda melhor para você!" data-position='top'>

              <?php

                  if ($_SESSION['embalagem'] == 1) {
                    ?>

                    <a href="../server/altera_embalagem.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/return.svg"></div>
                        <span class="col l12 s12">Embalagem Retornável</span>
                      </div>
                    </a>                

                    <a href="../server/altera_embalagem.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/garbage (1).svg"></div>
                        <span class="col l12 s12">Embalagem Descartável</span>
                      </div>
                    </a>

                    <?php
                  }elseif ($_SESSION['embalagem'] == 2){

                    ?>

                    <a href="../server/altera_embalagem.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/return.svg"></div>
                        <span class="col l12 s12">Embalagem Retornável</span>
                      </div>
                    </a>

                    <a href="../server/altera_embalagem.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem selectDash btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/garbage (1).svg"></div>
                        <span class="col l12 s12">Embalagem Descartável</span>
                      </div>
                    </a>

                    <?php
                  }else{
                    ?>

                    <a href="../server/altera_embalagem.php?id=1" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/return.svg"></div>
                        <span class="col l12 s12">Embalagem Retornável</span>
                      </div>
                    </a>

                    <a href="../server/altera_embalagem.php?id=2" class="col l6 s12 nopad">
                      <div class="btnItem btnItemDash">
                        <div class="col l12 s12"><img src="../img/icones/garbage (1).svg"></div>
                        <span class="col l12 s12">Embalagem Descartável</span>
                      </div>
                    </a>
                  <?php
                  }
                    ?>
           
              </div>
            </div>


            <div class="col l12 containerMenu">
              <div class="tituloMenus tituloDash"   align="left">
                <h4>Meu Menu:</h4>
                <span>Clique sobre um item para alterar</span>
              </div>

              <div class="btnMenus btnDash menuDash row" data-step="4" data-intro="Selecione o Menu que você gostaria de utilizar, assim você filtra os produtos que aparecerão na sua página de favoritos, para mais detalhes você pode acessar a página CARDÁPIOS e olhar os produtos disponíveis em cada menu." data-position='top'>

                <?php

                  $sql = "SELECT * FROM menu";
                  $query = mysql_query($sql);
                  while ($res = mysql_fetch_array($query)) {
                  
                  if ($_SESSION['pagamento'] == 1) {
                   if ($res['id'] == $_SESSION['menu']) {
                  
                  ?>

                      <a style="cursor: pointer;" onclick="Materialize.toast('Você só pode alterar o menu após o vencimento do seu plano atual!', 4000)" class="col l3 s12 linkMenu" id="selectMenu">
                        <div class="btnItem selectDash btnItemDash" style="height: 230px !important; padding-top: 10px !important">
                          <span class="col l8 offset-l2 s8 offset-s2 chip white-text chipmenu" style="background-color: <?= $res['cor'] ?> !important; margin-bottom: 10px !important">&cong; R$<?= number_format($res['diario'], 2, ',', '.'); ?> / dia</span>
                          <div class="col l12 s12"><img src="../img/icones/menu.svg"></div>
                          <span class="col l12 s12">Menu <?= $res['nome'] ?></span>
                        </div>
                      </a>

                  <?php

                    }else{

                  ?>

                      <input type="text" name="id" id="idMenu" value="<?= $res['id'] ?>" hidden>

                      <a style="cursor: pointer;" onclick="Materialize.toast('Você só pode alterar o menu após o vencimento do seu plano atual!', 4000)"  class="col l3 s12 linkMenu" id="selectMenu">
                        <div class="btnItem btnItemDash" style="height: 230px !important; padding-top: 10px !important">
                          <span class="col l8 offset-l2 s8 offset-s2 chip white-text chipmenu" style="background-color: <?= $res['cor'] ?> !important; margin-bottom: 10px !important">&cong; R$<?= number_format($res['diario'], 2, ',', '.'); ?> / dia</span>
                          <div class="col l12 s12"><img src="../img/icones/menu.svg"></div>
                          <span class="col l12 s12">Menu <?= $res['nome'] ?></span>
                        </div>
                      </a>

                  <?php

                     }
                  }else{
                    if ($res['id'] == $_SESSION['menu']) {
                  
                  ?>

                      <a href="../server/altera_menu.php?id=<?= $res['id'] ?>" class="col l3 s12 linkMenu" id="selectMenu">
                        <div class="btnItem selectDash btnItemDash" style="height: 230px !important; padding-top: 10px !important">
                          <span class="col l8 offset-l2 s8 offset-s2 chip white-text chipmenu" style="background-color: <?= $res['cor'] ?> !important; margin-bottom: 10px !important">&cong; R$<?= number_format($res['diario'], 2, ',', '.'); ?> / dia</span>
                          <div class="col l12 s12"><img src="../img/icones/menu.svg"></div>
                          <span class="col l12 s12">Menu <?= $res['nome'] ?></span>
                        </div>
                      </a>

                  <?php

                    }else{

                  ?>

                      <input type="text" name="id" id="idMenu" value="<?= $res['id'] ?>" hidden>

                      <a href="../server/altera_menu.php?id=<?= $res['id'] ?>" class="col l3 s12 linkMenu" id="selectMenu">
                        <div class="btnItem btnItemDash" style="height: 230px !important; padding-top: 10px !important">
                          <span class="col l8 offset-l2 s8 offset-s2 chip white-text chipmenu" style="background-color: <?= $res['cor'] ?> !important; margin-bottom: 10px !important">&cong; R$<?= number_format($res['diario'], 2, ',', '.'); ?> / dia</span>
                          <div class="col l12 s12"><img src="../img/icones/menu.svg"></div>
                          <span class="col l12 s12">Menu <?= $res['nome'] ?></span>
                        </div>
                      </a>

                  <?php

                     }
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

       <div class="fixed-action-btn horizontal click-to-toggle">
        <a href="contato.php" class="btn-floating btn-large red tooltipped" data-position="top" data-delay="50" data-tooltip="Contato">
          <i class="material-icons">chat_bubble</i>
        </a>
      </div>
        
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/intro.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $(".button-collapse").sideNav();
        });

        $('.abreEditar').click(function(){
          $('#editarImagem').openModal();
        });

        $('.abreEditarInfo').click(function(){
          $('#editarInfo').openModal();
        });

        $('input[type=file]').change(function() {
           $('label').text("Arquivo Selecionado");
        });



      </script>
    </body>
  </html>