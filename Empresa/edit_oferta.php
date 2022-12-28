<?php
session_start();
require("../config.php");

/* Ver se o formulário foi submetido */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_oferta = filter_input(INPUT_POST, 'e_ID_oferta');
    $Titulo = filter_input(INPUT_POST, 'e_Titulo');
    $Vagas = filter_input(INPUT_POST, 'e_Vagas');
    $Estado_oferta_ID_estado= filter_input(INPUT_POST, 'e_Estado_oferta_ID_estado');
    $Descricao= filter_input(INPUT_POST, 'e_Descricao');
    $Categoria_Salarial = filter_input(INPUT_POST, 'e_Categoria_Salarial');
    $Data_Criacao = filter_input(INPUT_POST, 'e_Data_Criacao');
    $Area_ID_area = filter_input(INPUT_POST, 'e_Area_ID_area');
    $Empresa_ID_empresa = filter_input(INPUT_POST, 'e_Empresa_ID_empresa');
    $Tipo_oferta_ID_tipo = filter_input(INPUT_POST, 'e_Tipo_oferta_ID_tipo');
    $Local_ID_local = filter_input(INPUT_POST, 'e_Local_ID_local');
    $Regime_ID_regime = filter_input(INPUT_POST, 'e_Regime_ID_regime');



    /* validar os dados recebidos do formulario */
    if (empty($Titulo)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


/* texto sql da sql*/
$sql = "UPDATE oferta SET  Titulo = '$Titulo', Vagas = '$Vagas', Estado_oferta_ID_estado = '$Estado_oferta_ID_estado', Descricao = '$Descricao', Categoria_Salarial  = '$Categoria_Salarial', Data_Criacao='$Data_Criacao', Area_ID_area = '$Area_ID_area', Tipo_oferta_ID_tipo='$Tipo_oferta_ID_tipo', Local_ID_local='$Local_ID_local',  Regime_ID_regime='$Regime_ID_regime'  where ID_oferta = $ID_oferta ";

/* executar a sql e testar se ocorreu erro */
if (!$link->query($sql)) {
    echo " ERRO - Falha ao executar a sql: \"$sql\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */
}
else {
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    header("location: gerir_oferta.php");

    $link->close();
}
/* fechar a ligação */
?>




