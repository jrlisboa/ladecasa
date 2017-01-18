<?php

include('conecta.php');

$id = utf8_decode($_POST['id']);
$nome = utf8_decode($_POST['nome']);
$tipo = $_POST['tipo'];
$menu = $_POST['menu'];
$detalhes = utf8_decode($_POST['detalhes']);

echo "string";

mysql_query("
    UPDATE produto
    SET nome = '$nome', id_tipo = '$tipo', detalhes = '$detalhes'
    WHERE id = '$id'");

mysql_query("DELETE FROM produto_menu WHERE id_produto = '$id'");

for ($i=0;$i<count($menu);$i++){
   
   $menu_atual = $menu[$i];
   mysql_query("INSERT INTO produto_menu (id_produto, id_menu) VALUES ('$id', '$menu_atual')");
   
}

/*for ($i=0;$i<count($menu);$i++){

    $novoSql = "SELECT * FROM produto_menu WHERE id_produto='$id'";
    $novaQuery = mysql_query($novoSql) or die(mysql_error());
    while ($final = mysql_fetch_array($novaQuery)) {

        if ($final['id_menu'] != $menu[$i]){

            mysql_query("
            INSERT INTO produto_menu (id_produto, id_menu)
            VALUES ('".$id."', '".$menu[$i]."')
            ");
            echo "Não Existe";
        
        }else{

            mysql_query("
            UPDATE produto_menu
            SET id_menu = '$id_menu'
            WHERE id = '".$final['id']."'
            ");
            echo "Existe";
        }

        echo $final['id_menu'];
        echo "<br>";
    }
        
}*/

//header("Location: ../produtos.php");

   
?>