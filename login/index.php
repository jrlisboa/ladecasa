<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        header("Location: ../dashboard/"); exit; //Redireciona o visitante para login
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
      <title>Login | Lá de Casa</title>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <div class="tudo rown tudoLogin">

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
                  <li><a class="loginBtn btn" href="#">Login</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="#">Login</a></li>
                </ul>
              </div>
            </nav>
          </div>


          <div class="container row forms">
            
            <div class="formLogin col l4 s12">
              <div class="conteudoLogin">

                <h5>Faça o Login:</h5>
                


                <form id="formLogin">
                  <span>Email:</span>
                  <input id="emailLogin" type="text" name="email">

                  <span>Senha:</span>
                  <input id="senhaLogin" type="password" name="senha">

                  <input id="fazerLogin" type="submit" name="enviar" value="Entrar">
                </form>

                <span id="erro" hidden class="erroLogin">Login ou senha Incorretos</span>
                <br>
                <span>Não possui uma conta? Efetue um cadastro no formulário ao lado, não perca tempo! :)</span>
                
                
              </div>
            </div>

            <div class="formCadastro col l7 offset-l1 s12">
              
              <div class="conteudoCadastro">

                <h5>Crie sua Conta:</h5>


                <form id="cadUsuario" class="row">

                  <div class="col l6">
                    <span>Nome:</span>
                    <input type="text" name="nome" id="nome">

                    <span>Endereço do escritório:</span>
                    <input type="text" name="end_escritorio" id="end_escritorio">

                    <span>CPF:</span>
                    <input type="text" name="cpf" id="cpf" size="12" maxlength="14"  OnKeyPress="formatar('###.###.###-##', this)">

                    <span>Email:</span>
                    <input type="text" name="email" id="email">
                  </div>

                  <div class="col l6">
                  <span>Sobrenome:</span>
                    <input type="text" name="sobrenome" id="sobrenome">

                    <span>Data de nascimento:</span>
                    <input type="date" name="nascimento" id="idade">

                    <span>Nome da Empresa:</span>
                    <input type="text" name="empresa" id="empresa">

                    <span>Crie sua senha:</span>
                    <input type="password" name="senha" id="senha">
                  </div>

                  <div class="col l12">                    
                    <input id="salvar" class="col l6 offset-l3" type="submit" name="enviar" value="Criar conta">
                  </div>                 

                  
                </form>
                
              </div>
            </div>



        <div id="cadastrado" class="modal modal-fixed-footer">
          <div class="modal-content" align="center">
            <h4 class="modalTitulo">Galeria de Fotos</h4>

            <h5>Muito bem! Você agora possui uma conta no nosso site, utilize o formulário de login para acessar o seu perfil e começar a utilizar o sistema!</h5>
          </div>

          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
          </div>
        </div>
        
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

      <script type="text/javascript">
        function formatar(mascara, documento){
            var i = documento.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(i)
            if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
            }
        }
      </script>
        
      <script type="text/javascript">
        $(document).ready(function(){
          $(".button-collapse").sideNav();
          $('#cadUsuario').validate();

          ///////// cadastro do usuario
          $('#salvar').click(function() {


            var dados = $('#cadUsuario').serialize();
            console.log(dados);
            var concluido = $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../server/cadastro_user.php',
                async: true,
                data: dados,
                success: function(response) {
                    if(response==0){            
                      location.href='../dashboard/'  //Redireciona
                    } else if (response==1){
                      alert("Preencha todos os campos!");
                    }else if(response==2){
                      alert("Este email já está sendo utilizado, faça o login!");
                    }else if(response==3){
                      alert("Este CPF já está cadastrado!");
                    }
                }
            });
            return false;
          });

          ///////// login
          $('#fazerLogin').click(function(){  //Ao submeter formulário
            var email=$('#emailLogin').val();  //Pega valor do campo email
            var senha=$('#senhaLogin').val();  //Pega valor do campo senha
            $.ajax({      //Função AJAX
              url:"../server/login.php",      //Arquivo php
              type:"post",        //Método de envio
              data: "email="+email+"&senha="+senha, //Dados
                success: function (result){     //Sucesso no AJAX
                            if(result==1){            
                              location.href='../dashboard/'  //Redireciona
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