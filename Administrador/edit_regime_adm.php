<?php
session_start();
require("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idRegime = filter_input(INPUT_POST, 'c_idRegime');
    $Regime = filter_input(INPUT_POST, 'c_Regime');


    if (empty($Regime)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE regime SET Regime='$Regime' WHERE ID_regime = $idRegime";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:inserir_regime_adm.php");

}
$link->close();

?>

