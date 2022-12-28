<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Regime = filter_input(INPUT_POST, 'q_Regime');


    /* validar os dados recebidos do formulario */
    if (empty($Regime)) {

        echo "Todos os campos do formulário devem conter valores ";

    } else {
        require("../config.php");
        $link->set_charset("utf8");
        /* texto sql da sql*/
        $ar = "INSERT INTO regime (Regime) VALUES ('$Regime')";
        /* executar a sql e testar se ocorreu erro */
        if (!$link->query($ar)) {
            echo "  Falha ao executar a sql: \"$ar\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {

            header("location: inserir_regime_adm.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>

