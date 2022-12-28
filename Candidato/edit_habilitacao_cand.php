<?php
session_start();
require("../config.php");


/* Ver se o formulário foi submetido */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_utilizador = filter_input(INPUT_POST, 'ha_ID_utilizador');
    $Habilitacao_ID_habilitacao = filter_input(INPUT_POST, 'ha_Habilitacao_ID_habilitacao');


    if (empty($Habilitacao_ID_habilitacao)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo " ERRO - Não foi possível editar. ";
    exit();
}


$editar ="UPDATE utilizador SET Habilitacao_ID_habilitacao='$Habilitacao_ID_habilitacao' WHERE ID_utilizador = $ID_utilizador";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:inserir_habilitacao.php");

}
$link->close();

?>


