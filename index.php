<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: index.html"); exit; //Redireciona o visitante para login
}
?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="css/style.css"  />
      <title>Lá de Casa</title>

      <meta charset="utf-8">

      <link rel="apple-touch-icon" sizes="57x57" href="img/fav/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="img/fav/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="img/fav/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="img/fav/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="img/fav/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="img/fav/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="img/fav/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="img/fav/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="img/fav/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="img/fav/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="img/fav/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="img/fav/favicon-16x16.png">
      <link rel="manifest" href="img/fav/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#F39C12">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <div class="tudo">

        <!--TOPO DA LANDING-->
        <div class="topo row">

          <div class="navbar-fixed">
            <nav id="navbar">
              <div class="nav-wrapper">
                <a href="#" class="brand-logo">Lá de Casa</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a class="menuItem" href="#">Home</a></li>
                  <li><a class="menuItem" href="#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="dicas">Dicas</a></li>
                  <li><a class="menuItem" href="menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="#">Home</a></li>
                  <li><a class="menuItem" href="#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="dicas">Dicas</a></li>
                  <li><a class="menuItem" href="menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
              </div>
            </nav>
          </div>

          <div class="col l2 offset-l1 card notinha" style="height: auto; position: absolute; margin-top: 100px; border-radius: 50px 0px 50px 0px; background-color: #FEC632">
            <h1 style="font-family: 'Sue Ellen Francisco', cursive; font-size: 40px; text-align: center; margin-bottom: -6px;">Notinha:</h1>
            <p id="limitarInicio" style="font-size: 18px; ">
            </p>
          </div>
          <div class="col l12 s12">

            <div class="logoGrande col l2 offset-l5 s6 offset-s3 m2 offset-m5">
              <img src="img/icones/logo.png">
            </div>

            <div class="textTopo col l12 s12 m12">
              <span>Levamos um lanchinho até você<br>Porque a gente se preocupa com a sua saúde</span>
            </div>

            <div class="divisor col l4 offset-l4 s12 m6 offset-m3"></div>

            <div class="seta col l4 offset-l4 s12 m4 offset-m4"></div>
            
          </div>
          
        </div>




        <!--COMO FUNCIONA-->
        <a name="comofunciona" style="margin-bottom: 90px !important;"></a>

        <div class=" funciona row">

          <div class="tituloContainer">
            <h2>Como Funciona?</h2>
          </div>

          <div class="textoContainer col l6 offset-l3">
            <span style="font-size: 18px">Não conhece o Lá de Casa? Vamos explicar como ele funciona pra você. Nós preparamos aquele lanchinho que é tão difícil organizar no dia-a-dia. Você faz sua assinatura e recebe um Kit contendo: um ítem salgado, uma fruta, uma bebida, um ítem adicional e <strong class="tooltipped" data-position="top" data-delay="50" data-tooltip="De 2 a 3 vezes na semana." style="cursor: pointer;">eventualmente</strong> um docinho.</span>
          </div>

          <div class="gridComo container">
            
            <div class="col l3 itemFunciona">
              <img class="col l12" src="img/icones/mesa.svg">
              <span class="col l12">Bateu a fome no trabalho?</span>
            </div>

            <div class="col l3 itemFunciona">
              <img class="col l12 menor" src="img/icones/lista.svg">
              <span class="col l12">Selecione um dos diversos menus do site.</span>
            </div>

            <div class="col l3 itemFunciona">
              <img class="col l12 menor2" src="img/icones/caminhao.svg">
              <span class="col l12">Vamos levar o que você pediu.</span>
            </div>

            <div class="col l3 itemFunciona">
              <img class="col l12 menor2" src="img/icones/sanduiche.svg">
              <span class="col l12">E você aproveita nossos deliciosos produtos ;)</span>
            </div>

          </div>

          <div class="textoContainer col l12 " style=" margin-top: 20px;">
            <span style="font-size: 18px">Você escolhe um dos nossos cardápios e seleciona todos os produtos que você gosta.
            </span>
          </div>

          <div class="pequenoCad row">
            <span class="col l12" style="margin-top: 20px !important">Quer experimentar? É fácil, basta se cadastrar clicando <a href="login"><span class="aqui">aqui</span></a></span>
          </div>

          <div class="btnBottom row">
            <span id="abre2" style="margin-top: -20px;" class="col l2 offset-l5 s8 offset-s2">Conheça Mais</span>
          </div>
          
        </div>





        <!--QUEM SOMOS-->
        <a name="quemsomos"></a>

        <div class="quemSomos row">
          
          <div class="tituloContainer">
            <h2>Quem Somos?</h2>
          </div>


          <div class="textoContainer col l10 offset-l1">
            <span>

            Somos uma equipe que entendeu ser importante fornecer aquele lanchinho que fica tão difícil preparar na correria do dia-a-dia. A gente começa a dieta, promete que o cenário vai mudar, mas no meio do caminho a rotina se complica e o projeto fica interrompido.

            Também entendemos que é possível criar um compartilhamento alimentar: fica mais variado e com preço acessível!</span>
          </div>


          <div class="galeria row">

            <div class="tituloGaleria col l3 s12">
              <h3>Galeria de<br>Fotos</h3>
            </div>

            <div id="galeria"></div>
            
          </div>


          <div class="btnBottom row">
            <span class="col l2 offset-l5 s8 offset-s2" id="abreFotos">Ver todas as fotos</span>
          </div>


        </div>






        <!--CHAMADA PARA CADASTRO-->


        <div class="chamada row">

          <div class="textoChamada col l7">
            <span class="tituloChamada col l12">Venha apreciar os nossos menus!</span>
            <span class="segundoChamada col l12">Cadastre-se e conheça as variedades que você pode encontrar aqui :)</span>
          </div>

          <a href="login"><span class="btnChamada col l2 s8">Cadastre-se</span></a>

          <div class="col l1 offset-l1 s4">
            <img src="img/icones/sorrindo.svg" class="imgChamada">    
          </div>
                
          
        </div>






        <!-- ONDE ESTAMOS -->
        <a name="ondeestamos"></a>


        <div class="row onde">

          <div class="tituloContainer">
            <h2>Onde estamos?</h2>
          </div>


          <div class="container conteudoOnde">

          <div class=" col l6 m6 s12">
            <span align="right" style="font-size: 16px; font-weight: 400">Estamos localizados na Rua Guaraiúva, 268 Brooklin e você será sempre bem vindo para visitar nossas instalações.<br>
            Para que todos recebam tudo fresquinho, preparado no dia, atenderemos as regiões do Brooklin, Vila Olímpia, Moema, Campo Belo, Parte do Morumbi, Chácara Santo Antônio e Pinheiros.<br>Caso Você seja de outra região, consulte-nos!</span>

            <div class="contato" style="margin-top: 40px;">

            <h3>Telefones para contato:</h3>

            <div class="telefones row" style="margin-top: 20px;">
              <div class="telText col l6 s6">
                <span style="color: #1a1a1a !important">(11) 96058 - 7920 - VIVO</span><br>
                <span style="color: #1a1a1a !important">(11) 5102-4323 - FIXO</span>
              </div>
              <div class="telIcon col l6 s6">
                <img src="img/icones/whats.svg">
              </div>
            </div>
              
            </div>
          </div>

          <div class="mapaOnde col l6 m6 s12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.767669972183!2d-46.69274968502119!3d-23.61266378465754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50c9cb462895%3A0x3b7d0aa0f7be071e!2sR.+Guaraiuva%2C+268+-+Cidade+Mon%C3%A7%C3%B5es%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1481390947858" frameborder="0"></iframe>
          </div>
            
          </div>

        </div>









        <!-- FOOTER -->



        <footer class="page-footer ladeFooter cimaFooter">
          <div class="container ">
            <div class="row">
              <div class="col l4 s12">
                <h5 class="white-text">Menu:</h5>
                <ul>
                  <li><a class="white-text" href="#">Home</a></li>
                  <li><a class="white-text" href="#comofunciona">Como funciona</a></li>
                  <li><a class="white-text" href="#quemsomos">Quem Somos</a></li>
                  <li><a class="white-text" href="#ondeestamos">Onde estamos</a></li>
                  <li><a class="white-text" href="menus">Cardápios</a></li>
                  <li><a class="white-text" href="login">Login</a></li>
                </ul>
              </div>

              <div class="col l3 offset-l1 s12">
                <h5 class="white-text">Contas:</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="login">Cadastre-se</a></li>
                  <li><a class="grey-text text-lighten-3" href="login">Faça o Login</a></li>
                </ul>
              </div>

              <div class="col l3 offset-l1 s12">
                <h5 class="white-text">Redes Sociais:</h5>
                <div class="row redes">
                  <div class="redeIcon col l4 s4">
                    <a href="https://www.facebook.com/L%C3%A1-de-Casa-Comida-Saud%C3%A1vel-1851501558470438/"><img src="img/icones/facebook.svg"></a>
                  </div>
                  <div class="redeIcon col l4 s4">
                    <a href=""><img src="img/icones/instagram.svg"></a>
                  </div>
                  <div class="redeIcon col l4 s4">
                    <a href="https://www.linkedin.com/company/la-de-casa-comida-saud%C3%A1vel?trk=nav_account_sub_nav_company_admin"><img src="img/icones/twitter.svg"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="footer-copyright">
            <div class="container copy">
            Lá de casa 2016/2017 &copy; Todos os direitos reservados.
            </div>
          </div>
        </footer>





      <div id="fotos" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4 class="modalTitulo">Galeria de Fotos</h4>

            <div class="fotos row" id="fotosModal">
              <div class="imagemModal col l6 s12">
                <img src="img/imagens/bebe.jpg">
              </div>
              <div class="imagemModal col l6 s12">
                <img src="img/imagens/doces.jpg">
              </div>
              <div class="imagemModal col l6 s12">
                <img src="img/imagens/sanduba.jpg">
              </div>
              <div class="imagemModal col l6 s12">
                <img src="img/gelatina.jpg">
              </div>
              <div class="imagemModal col l6 s12">
                <img src="img/granola.jpg">
              </div>
              <div class="imagemModal col l6 s12">
                <img src="img/maça.jpg">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
          </div>
        </div>

        <!-- Modal Structure -->
        <div id="modal2" class="modal bottom-sheet row">
            <img id="desk" class="col s12 m12 l8 offset-l2" src="img/inicio.png">
            <img id="mobile" class="col s12 m12 l8 offset-l2" src="img/mobile.png">        
        </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $(".button-collapse").sideNav();


          $('#galeria').empty(); //Limpando a tabela
          $.ajax({
            type:'post',    //Definimos o método HTTP usado
            dataType: 'json', //Definimos o tipo de retorno
            url: 'server/galeria.php',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
              for(var i=1;3>=i;i++){
                //Adicionando registros retornados na tabela

                //mostrando categoria
                $('#galeria').append('<div class="itemGaleria col l3 s12"><img src="img/galeria/'+dados[i].imagem+'"></div>');       
              }
            }
          });


          $('#fotosModal').empty(); //Limpando a tabela
          $.ajax({
            type:'post',    //Definimos o método HTTP usado
            dataType: 'json', //Definimos o tipo de retorno
            url: 'server/galeria.php',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
              for(var i=1;dados.length>=i;i++){
                //Adicionando registros retornados na tabela

                //mostrando categoria
                $('#fotosModal').append('<div class="imagemModal col l6 s12"><img src="img/galeria/'+dados[i].imagem+'"></div>');       
              }
            }
          });


          $('#limitarInicio').empty(); //Limpando a tabela
          $.ajax({
            type:'post',
            dataType: 'text',
            url: 'server/notinha.php',
            success: function(dados){
              $('#limitarInicio').text(dados);
            }
          });
        });
      </script>
      <script type="text/javascript">

        $(function(){ //
           var navbarTop = $('#navbar').offset().top; // retorna a posicao

           $(window).scroll(function(){ // evento scroll
              var windowTop = $(window).scrollTop();

              if (1 < windowTop) {
                  $('#navbar').css({'background-color':'#f39c12'}); //adiciona a classe
                  //$('#navbar').css({ position: 'fixed', top: 0 }); ou altere o estilo conforme quiser
              } else {
                  $('#navbar').css({'background-color':'unset'}); //remove a classe
                  //$('#navbar').css('position','static'); ou altere o estilo
              }
          });
        });


        $('#abreFotos').click(function(){
          $('#fotos').openModal();
        });

        $('#abre2').click(function(){
          $('#modal2').openModal();
        });
      </script>
    </body>
  </html>