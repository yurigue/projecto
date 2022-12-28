<?php
session_start();
require("../config.php");


/* Ver se o formulário foi submetido */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_candidatura = filter_input(INPUT_POST, 'ca_ID_candidatura');
    $Estado_candidatura_ID_estado = filter_input(INPUT_POST, 'ca_Estado_candidatura_ID_estado');


    if (empty($Estado_candidatura_ID_estado)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo " ERRO - Não foi possível editar. ";
    exit();
}


$editar ="UPDATE candidatura SET Estado_candidatura_ID_estado='$Estado_candidatura_ID_estado' WHERE ID_candidatura = $ID_candidatura";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:candidatura_adm.php");

}
$link->close();

?>


