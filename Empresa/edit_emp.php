<?php
require_once("../config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["ID_empresa"];
    $Nome = filter_input(INPUT_POST, 'e_Nome');
    $Email = filter_input(INPUT_POST, 'e_Email');
    $Telefone = filter_input(INPUT_POST, 'e_Telefone');
    $Morada = filter_input(INPUT_POST, 'e_Morada');
    $Local_ID_local = filter_input(INPUT_POST, 'e_Local_ID_local');
    $Area_ID_area= filter_input(INPUT_POST, 'e_Area_ID_area');
    $Nif= filter_input(INPUT_POST, 'e_Nif');







    if (empty($Nome)){
        echo "Todos os campos do formulário devem conter valor! ";
        exit();
    }

}
else{
    echo "  Não foi possível edita!. ";
    exit();
}


$Edit ="UPDATE empresa SET  Nome='$Nome', Email= '$Email', Telefone='$Telefone',Morada='$Morada',Local_ID_local='$Local_ID_local' ,Area_ID_area='$Area_ID_area',Nif='$Nif'  WHERE ID_empresa = '$id'";

if (!$link->query($Edit)) {
    echo " Falha ao executar a consulta: \"$Edit\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {

    header( "location:perfil_empresa.php");
    $link->close();
}


?>