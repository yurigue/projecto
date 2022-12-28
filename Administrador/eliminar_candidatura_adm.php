<?php
session_start();
require("../config.php");


$oferta_10 = $_GET['ID_candidatura'];
$apagar_10 ="DELETE FROM candidatura WHERE ID_candidatura = $oferta_10";
$resultado=$link->query($apagar_10);


if ($resultado=$link->query($apagar_10)) {
    echo "O registro da oferta foi excluido";
    header( "location: candidatura_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr a oferta";
}

?>

