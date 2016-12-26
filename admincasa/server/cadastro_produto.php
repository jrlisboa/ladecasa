<?php

    include('conecta.php');
    $pasta = "../../img/produtos/";

    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        $nome_imagem  = $_FILES['imagem']['name'];
        $nome = utf8_decode($_POST['nome']);
        $detalhes = utf8_decode($_POST['detalhes']);
        $menu = $_POST['menu'];
        $tipo = $_POST['tipo'];        
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){          
            
            $nome_atual = md5(uniqid(time())).$ext;
            $tmp = $_FILES['imagem']['tmp_name'];
            move_uploaded_file($tmp,$pasta.$nome_atual);

            mysql_query("
            INSERT INTO produto (imagem, nome, id_tipo, detalhes)
            VALUES ('$nome_atual', '$nome', '$tipo', '$detalhes')
            ");

            for ($i=0;$i<count($menu);$i++){

                $sql="SELECT * FROM produto WHERE imagem='".$nome_atual."'"; 
                $resultados = mysql_query($sql)or die (mysql_error());
                $res=mysql_fetch_array($resultados);
               
               mysql_query("
                INSERT INTO produto_menu (id_produto, id_menu)
                VALUES ('".$res['id']."', '".$menu[$i]."')
                ");
               
            }            
            
            header("Location: ../produtos.php");

        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
        }
    }else{
        echo "Selecione uma imagem";
        exit;
    }
   
?>