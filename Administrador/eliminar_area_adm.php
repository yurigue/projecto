<?php
session_start();
require("../config.php");


$lo = $_GET['ID_area'];
$dele ="DELETE FROM area WHERE ID_area = $lo";
$resulta=$link->query($dele);


if ($resulta=$link->query($dele)) {
    echo "O registro foi excluido";
    header( "location: inserir_area_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
