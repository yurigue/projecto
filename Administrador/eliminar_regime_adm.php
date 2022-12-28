<?php
session_start();
require("../config.php");


$lo = $_GET['ID_regime'];
$dele ="DELETE FROM regime WHERE ID_regime = $lo";
$resulta=$link->query($dele);


if ($resulta=$link->query($dele)) {
    echo "O registro foi excluido";
    header( "location: inserir_regime_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
