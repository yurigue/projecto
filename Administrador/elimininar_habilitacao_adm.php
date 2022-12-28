<?php
session_start();
require("../config.php");


$lo = $_GET['ID_habilitacao'];
$dele ="DELETE FROM habilitacao WHERE ID_habilitacao = $lo";
$resulta=$link->query($dele);


if ($resulta=$link->query($dele)) {
    echo "O registro foi excluido";
    header( "location: inserir_habilitacao_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
