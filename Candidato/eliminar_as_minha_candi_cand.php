<?php
session_start();
require("../config.php");


$can = $_GET['ID_candidatura'];
$delet ="DELETE FROM candidatura WHERE ID_candidatura = $can";
$resultado=$link->query($delet);


if ($resultado=$link->query($delet)) {
    echo "O registro foi excluido";
    header( "location: as_m_candi_cand.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
