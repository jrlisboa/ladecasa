<?php


    session_start();  //A seção deve ser iniciada em todas as páginas
    if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
            session_destroy();            //Destroi a seção por segurança
            header("Location: ../login/"); exit; //Redireciona o visitante para login
    }


    include('conecta.php');
    $pasta = "../img/perfil/";

    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        $nome_imagem    = $_FILES['imagem']['name'];
        $tamanho_imagem = $_FILES['imagem']['size'];
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
            
            
            $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
            $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem
            
            /* se enviar a foto, insere o nome da foto no banco de dados */
            if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                mysql_query("
                    UPDATE user
                    SET imagem = '$nome_atual'
                    WHERE id = ".$_SESSION['usuarioID']);
                
                    $_SESSION['imagem']=$nome_atual;
                    header("Location: ../dashboard/");
            }else{
                echo "Falha ao enviar";
            }

        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
        }
    }else{
        echo "Selecione uma imagem";
        exit;
    }
   
?>