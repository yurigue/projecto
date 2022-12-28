<?php
$user_name = "root";
$password = "";
$dbname = "ajuda";
$server = "localhost";

$con = mysqli_connect($user_name, $password, $dbname, $server);

if ($con) {

    echo "Base de dados encontrado";

}

else {

    echo "Base de dados não encontrado";

}
?>