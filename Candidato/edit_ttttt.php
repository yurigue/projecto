<?php
require_once("../config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_habilitacao = $_SESSION["ID_habilitacao"];
    $habilitacao = filter_input(INPUT_POST, 'x_habilitacao');










    if (empty($habilitacao)){
        echo "Todos os campos do formulário devem conter valor! ";
        exit();
    }

}
else{
    echo "  Não foi possível edita!. ";
    exit();
}


$Edit ="UPDATE habilitacao SET Habilitacao='$habilitacao' WHERE ID_habilitacao = '$ID_habilitacao'";

if (!$link->query($Edit)) {
    echo " Falha ao executar a consulta: \"$Edit\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {

    header( "location:perfil_candidato.php");
    $link->close();
}

?>