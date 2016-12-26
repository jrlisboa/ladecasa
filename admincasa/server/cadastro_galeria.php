<?php

    include('conecta.php');
    $pasta = "../../img/galeria/";

    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        $nome_imagem  = $_FILES['imagem']['name'];
        $nome = utf8_decode($_POST['nome']);
        $detalhes = utf8_decode($_POST['detalhes']);
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            
            
            $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
            $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem
            
            /* se enviar a foto, insere o nome da foto no banco de dados */
            if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                mysql_query("
                    INSERT INTO galeria (imagem, nome, detalhes)
                    VALUES ('$nome_atual', '$nome', '$detalhes')
                    ");
                
                    header("Location: ../galeria.php");
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