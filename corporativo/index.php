<?php
session_start();  //A seção deve ser iniciada em todas as páginas
include '../server/conecta.php';
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        $semSessao = 1; //Redireciona o visitante para login
}else{
  $semSessao = 0;
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
        <div class="corp row">

          <div class="navbar-fixed">
            <nav id="navbar">
              <div class="nav-wrapper">
                <a href="#" class="brand-logo">Lá de Casa</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a class="menuItem" href="../#">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../dicas">Dicas</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <?php if ($semSessao == 1) { ?>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                  <?php }else{ ?>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                  <?php } ?>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../#">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../dicas">Dicas</a></li>
                  <li><a class="menuItem" href="../">Cardápios</a></li>
                  <?php if ($semSessao == 1) { ?>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                  <?php }else{ ?>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </nav>
          </div>

          <div class="col l12 s12">

            <div class="textTopo textTopoCorp col l12 s12 m12">
              <span>Levamos um lanchinho até você<br>Porque a gente se preocupa com a sua saúde</span>
            </div>

            <div class="divisor col l4 offset-l4 s12 m6 offset-m3"></div>

            
          </div>
          
        </div>







        <!-- PRODUTOS -->







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
                    <a href="https://www.facebook.com/L%C3%A1-de-Casa-Comida-Saud%C3%A1vel-1851501558470438/"><img src="../img/icones/facebook.svg"></a>
                  </div>
                  <div class="redeIcon col l4 s4">
                    <a href=""><img src="../img/icones/instagram.svg"></a>
                  </div>
                  <div class="redeIcon col l4 s4">
                    <a href="https://www.linkedin.com/company/la-de-casa-comida-saud%C3%A1vel?trk=nav_account_sub_nav_company_admin"><img src="../img/icones/twitter.svg"></a>
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

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
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


          $('#notinha').empty(); //Limpando a tabela
          $.ajax({
            type:'post',
            dataType: 'text',
            url: 'server/notinha.php',
            success: function(dados){
              $('#notinha').text(dados);
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