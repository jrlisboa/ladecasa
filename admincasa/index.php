<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (isset($_SESSION['usuarioID'])) {   //Verifica se há seções
          
        header("Location: galeria.php"); exit; //Redireciona o visitante para login
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
              
            </ul>
            <ul class="side-nav" id="mobile-demo">
              
            </ul>
          </div>
        </div>
      </nav>


      <div class="container" style="margin-top: 50px;">
        <h2 align="center">Painel Administrativo</h2>

        <div class="row">
          

          <form id="formLogin" class="col l6 offset-l3 s12" style="margin-top: 50px;">
            <span>Email:</span>
            <input id="emailLogin" type="text" name="email">

            <span>Senha:</span>
            <input id="senhaLogin" type="password" name="senha">

            <input id="fazerLogin" type="submit" name="enviar" value="Entrar" class="btn grey darken-2 white-text col l6 offset-l3" style="margin-top: 50px;">

            <span id="erro" hidden class="card white-text red col l12 s12 center" style="margin-top: 30px;">Login ou senha Incorretos</span>
          </form>

          <br>

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


          ///////// login
          $('#fazerLogin').click(function(){  //Ao submeter formulário
            var email=$('#emailLogin').val();  //Pega valor do campo email
            var senha=$('#senhaLogin').val();  //Pega valor do campo senha
            $.ajax({      //Função AJAX
              url:"server/login.php",      //Arquivo php
              type:"post",        //Método de envio
              data: "email="+email+"&senha="+senha, //Dados
                success: function (result){     //Sucesso no AJAX
                  //alert(result);
                            if(result==1){            
                              location.href='galeria.php'  //Redireciona
                            }
                            if(result==0){
                              $('#someImagem').hide(50);
                              $('#erro').show(100);   //Informa o erro
                            }
                        }
            });
            return false; //Evita que a página seja atualizada
          });
        });
      </script>
    </body>
  </html>