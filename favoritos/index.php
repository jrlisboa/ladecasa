<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
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
      <title>Favoritos | Lá de Casa</title>

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
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../login">Olá, <?= $_SESSION['nomeUsuario'] ?></a></li>
                </ul>
              </div>
            </nav>
          </div>


          <div id="salgados">
            
              <div class="container col l6 offset-l3 s12 produtos">            

                <div class="row">
                  <div class="tituloMenus tituloDash tituloPedido col l8" align="left">
                    <h4>Salgados</h4>
                    <span>Escolha uma opção entre os itens Salgados</span>
                  </div>

                  <div class="col l4" align="right">
                    <span class="etapa col l12 s12">Etapa 1</span>
                    <div class="btnBottom proximoBtn col l12 s12" align="center">
                      <a id="abreDoce">
                        <span class="produtosCadastro btnProximo">Próxima Etapa</span>
                      </a>
                    </div>
                  </div>
                </div>                

                <div class="btnMenus row">
                  
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
              
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                  
                </div>
              </div>


          </div>





















          <div id="doces" hidden>
            
              <div class="container col l6 offset-l3 s12 produtos">            

                <div class="row">
                  <div class="tituloMenus tituloDash tituloPedido col l8" align="left">
                    <h4>Doces</h4>
                    <span>Escolha uma opção entre os itens Doces</span>
                  </div>

                  <div class="col l4" align="right">
                    <span class="etapa col l12 s12">Etapa 2</span>
                    <div class="btnBottom proximoBtn col l12 s12" align="center">
                      <a id="abreFruta">
                        <span class="produtosCadastro btnProximo">Próxima Etapa</span>
                      </a>
                    </div>
                  </div>
                </div>                

                <div class="btnMenus row">
                  
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
              
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                  
                </div>
              </div>


          </div>





















          <div id="frutas" hidden>
            
              <div class="container col l6 offset-l3 s12 produtos">            

                <div class="row">
                  <div class="tituloMenus tituloDash tituloPedido col l8" align="left">
                    <h4>Frutas</h4>
                    <span>Escolha uma opção entre as Frutas</span>
                  </div>

                  <div class="col l4" align="right">
                    <span class="etapa col l12 s12">Etapa 3</span>
                    <div class="btnBottom proximoBtn col l12 s12" align="center">
                      <a id="abreVariado">
                        <span class="produtosCadastro btnProximo">Próxima Etapa</span>
                      </a>
                    </div>
                  </div>
                </div>                

                <div class="btnMenus row">
                  
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
              
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                  
                </div>
              </div>


          </div>



























          <div id="variados" hidden>
            
              <div class="container col l6 offset-l3 s12 produtos">            

                <div class="row">
                  <div class="tituloMenus tituloDash tituloPedido col l8" align="left">
                    <h4>Itens Variados</h4>
                    <span>Escolha uma opção entre os Itens Variados</span>
                  </div>

                  <div class="col l4" align="right">
                    <span class="etapa col l12 s12">Etapa 4</span>
                    <div class="btnBottom proximoBtn col l12 s12" align="center">
                      <a id="abreFinal">
                        <span class="produtosCadastro btnProximo">Próxima Etapa</span>
                      </a>
                    </div>
                  </div>
                </div>                

                <div class="btnMenus row">
                  
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
              
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
               
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                 
                    <div class="btnProduto btnSelectProduto btnItem4Produto col l3 s6">
                      <div class="col l12 s12 saberMais">Saber mais</div>
                      <div class="col l12 s12 imgProduto"><img src="../img/beirute.jpg"></div>
                      <span class="col l12 s12">Menu Veggie</span>
                    </div>
                  
                </div>
              </div>


          </div>







          <div id="final" hidden class="row">
            
              <div class="tituloMenus tituloDash tituloPedido col l8 offset-l2" align="center">
                <h4>Seus favoritos foram adicionados!</h4>
                <span>Perfeito! Anotamos seus novos favoritos, caso você ja tenha definido os seus itens favoritos, iremos atualizá-los na próxima quinzena!</span>
              </div>

              <div class="parabens col l2 offset-l5 s12">
                <img src="../img/icones/parabens.svg">
              </div>

              <div class="btnBottom row" align="center">
                <a id="finaliza" href="../dashboard"><span class="col l2 offset-l5 s6 offset-s3 produtosCadastro btnProximo">Voltar ao Perfil</span></a>
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
      </script>


      <script type="text/javascript">
        $('#abreDoce').click(function(){
          $('#salgados').hide();
          $('#doces').fadeIn(500);
        });
        $('#abreFruta').click(function(){
          $('#doces').hide();
          $('#frutas').fadeIn(500);
        });
        $('#abreVariado').click(function(){
          $('#frutas').hide();
          $('#variados').fadeIn(500);
        });
        $('#abreFinal').click(function(){
          $('#variados').hide();
          $('#final').fadeIn(500);
        });


        //$('.btnProduto').click(function(){
        //  $(this).addClass("produtoSelecionado");
        //});
      </script>
    </body>
  </html>