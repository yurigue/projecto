<?php
require_once("../config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_utilizador = filter_input(INPUT_POST, 'u_ID_utilizador');
    $username = filter_input(INPUT_POST, 'u_username');
    $Nome = filter_input(INPUT_POST, 'u_Nome');
    $Email = filter_input(INPUT_POST, 'u_Email');
    $Telefone = filter_input(INPUT_POST, 'u_Telefone');
    $Morada = filter_input(INPUT_POST, 'u_Morada');
    $Localidade = filter_input(INPUT_POST, 'u_Localidade');
    $Codigo_Postal= filter_input(INPUT_POST, 'u_Codigo_Postal');
    $Nif= filter_input(INPUT_POST, 'u_Nif');
    $Tipo_utilizador_ID_tipo= filter_input(INPUT_POST, 'u_Tipo_utilizador_ID_tipo');






    if (empty($username)){
        echo "Todos os campos do formulário devem conter valor! ";
        exit();
    }

}
else{
    echo "  Não foi possível edita!. ";
    exit();
}


$Edit ="UPDATE utilizador SET Username='$username', Nome='$Nome', Email= '$Email', Telefone='$Telefone', Morada='$Morada',Localidade='$Localidade' ,Codigo_Postal='$Codigo_Postal',Nif='$Nif', Tipo_utilizador_ID_tipo='$Tipo_utilizador_ID_tipo' WHERE ID_utilizador = $ID_utilizador";

if (!$link->query($Edit)) {
    echo " Falha ao executar a consulta: \"$Edit\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {

    header( "location:gerir_utilizador.php");
    $link->close();
}


?>
