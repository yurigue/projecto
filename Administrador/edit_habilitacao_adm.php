<?php
session_start();
require("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idHabilitacao = filter_input(INPUT_POST, 'c_idHabilitacao');
    $Habilitacao = filter_input(INPUT_POST, 'c_Habilitacao');


    if (empty($Habilitacao)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE habilitacao SET Habilitacao='$Habilitacao' WHERE ID_habilitacao = $idHabilitacao";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:inserir_habilitacao_adm.php");

}
$link->close();

?>

