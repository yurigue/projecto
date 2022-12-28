<?php
session_start();
require("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_candidatura = filter_input(INPUT_POST, 'ca_ID_candidatura');
    $visto= filter_input(INPUT_POST, 'ca_visto');


    if (empty($visto)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE candidatura SET visto='$visto' WHERE ID_candidatura = $ID_candidatura";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location: notificação_candidatura_adm.php");

}
$link->close();

?>


