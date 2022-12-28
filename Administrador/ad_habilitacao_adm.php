<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Habilitacao = filter_input(INPUT_POST, 'q_Habilitacao');


    /* validar os dados recebidos do formulario */
    if (empty($Habilitacao)) {

        echo "Todos os campos do formulário devem conter valores ";

    } else {
        require("../config.php");
        $link->set_charset("utf8");
        /* texto sql da sql*/
        $ar = "INSERT INTO habilitacao (Habilitacao) VALUES ('$Habilitacao')";
        /* executar a sql e testar se ocorreu erro */
        if (!$link->query($ar)) {
            echo "  Falha ao executar a sql: \"$ar\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {

            header("location: inserir_habilitacao_adm.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>

