<?php
session_start();
require("../config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]!=1){
        header("location: perfil_adm.php");
    }
}



if(!empty($_POST['Titulo'])||!empty($_POST['Vagas'])||!empty($_POST['Estado_oferta_ID_estado'])||!empty($_POST['Descricao'])||!empty($_POST['Categoria_Salarial'])||!empty($_POST['Regime_ID_regime'])||!empty($_POST['Data_Criacao']) ||!empty($_POST['Area_ID_area'])||!empty($_POST['Utilizador_ID_utilizador'])||!empty($_POST['Tipo_oferta_ID_tipo'])||!empty($_POST['Local_ID_local'])||!empty($_POST['Data_fim'])) {
    $Titulo = $_POST['Titulo'];
    $Vagas= $_POST['Vagas'];
    $Estado = $_POST['Estado_oferta_ID_estado'];
    $Descricao = $_POST['Descricao'];
    $Categoria_Salarial = $_POST['Categoria_Salarial'];
    $Regime = $_POST['Regime_ID_regime'];
    $Data_Criacao = $_POST['Data_Criacao'];
    $Area_idArea = $_POST['Area_ID_area'];
    $Empresa_ID_empresa = $_POST['Utilizador_ID_utilizador'];
    $Tipo_da_Oferta_ID_tipo= $_POST['Tipo_oferta_ID_tipo'];
    $Local_ID_local = $_POST['Local_ID_local'];
    $Data_fim = $_POST['Data_fim'];


    $sql = "INSERT INTO oferta(Titulo, Vagas, Estado_oferta_ID_estado, Descricao, Categoria_Salarial, Regime_ID_regime, Data_Criacao, Area_ID_area, Utilizador_ID_utilizador, Tipo_oferta_ID_tipo, Local_ID_local, Data_fim ) VALUES ('$Titulo','$Vagas','$Estado','$Descricao','$Categoria_Salarial','$Regime','$Data_Criacao','$Area_idArea','$Empresa_ID_empresa','$Tipo_da_Oferta_ID_tipo','$Local_ID_local','$Data_fim')";
    if (!mysqli_query($link, $sql)) {
        print_r(mysqli_error($link));

        $result = mysqli_query($link, "SELECT * FROM oferta INNER JOIN area ON  oferta.Area_ID_area= area.ID_area INNER JOIN utilizador ON oferta.Utilizador_ID_utilizador= utilizador.ID_utilizador  INNER JOIN tipo_oferta ON oferta.Tipo_oferta_ID_tipo= tipo_oferta.ID_tipo INNER JOIN local ON oferta.Local_ID_local= local.ID_local inner join estado_oferta on oferta.Estado_oferta_ID_estado = estado_oferta.ID_estado ");

        if ($result['ID_tipo'] == 1) {
            echo " Erro - Não pode fazer esta operação. ";
            echo ' <br> <a href="gerir_oferta_adm.php"> Voltar a gerir  oferta  </a>';
            exit();
        }

    }

    header("Location:gerir_oferta_adm.php");

}

?>


<?php
//$cand = "SELECT *FROM utilizador WHERE Tipo_utilizador_ID_tipo = 1" ;

$id=$_SESSION["ID_utilizador"];
/* definir o charset utilizado na ligação */



$sql = "SELECT * FROM utilizador WHERE ID_utilizador = '$id'";
$resulta12 = $link->query($sql);


$bus= $resulta12->fetch_assoc();
$Nome  = $bus['Nome'];
$username  = $bus['Username'];
$Telefone = ( $bus['Telefone']);
$Email  = $bus['Email'];
$Morada  = $bus['Morada'];
$Localidade  = $bus['Localidade'];
$cp = $bus['Codigo_Postal'];
$Nif = $bus['Nif'];
$imagem = $bus['Imagem'];


?>


<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../imagem/ajuda.png">
    <title>Ajuda.Empregos</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.min.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-wrapper">
    <div class="header" style="background-color:#1A2E46">
        <div class="header-left">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-signin">
                <a href="../index.php" class="logo">
                    <img src="../imagem/ajuda.png" width="120" height="40" alt=""> <span>AJUDA.EMPREGOS</span>
                </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <?php
            $query ="SELECT * FROM candidatura  WHERE Visto='0' ORDER BY ID_candidatura DESC;";
            $query_run = mysqli_query($link, $query);
            $rows =mysqli_num_rows($query_run);
            ?>
            <li class="nav-item dropdown d-none d-sm-block">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right"><?php echo"$rows" ?></span></a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span>Notificações</span>
                    </div>
                    <div class="drop-scroll">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <?php
                                /* definir o charset utilizado na ligação */
                                $link->set_charset("utf8");

                                $candida_10="SELECT candidatura.*, utilizador.* , oferta.*, estado_candidatura.*   FROM candidatura inner join utilizador on candidatura.Utilizador_ID_utilizador = utilizador.ID_utilizador inner join oferta on candidatura.Oferta_ID_oferta = oferta.ID_oferta inner join estado_candidatura on candidatura.Estado_candidatura_ID_estado = estado_candidatura.ID_estado where visto ='0'";

                                if($resul10=$link->query($candida_10)){

                                    while ($row=$resul10->fetch_assoc()){
                                        echo'<tr> 
                                <a href="notificação_candidatura_adm.php?acao=add&id='.$row['ID_candidatura'].'">
                                    <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="../imagem/'.$row['Imagem'].'" class="img-fluid">
											</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">'.$row['Nome'].'</span> Candidatou-se a oferta <span class="noti-title">'.$row['Titulo'].'</span></p>
                                            <p class="noti-time"><span class="notification-time">'.$row['Data'].'</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
            </tr>';
                                    }
                                    $resul10->free();

                                }


                                ?>

                        </ul>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../imagem/<?php echo"$imagem" ?>" width="40" alt="">
							<span class="status online"></span></span>
                    <span><?php echo"$username" ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterarpassord_adm.php">Alterar Password</a>
                    <a class="dropdown-item" href="../Logout/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                <a class="dropdown-item" href="alterarpassord_adm.php">Alterar Password</a>
                <a class="dropdown-item" href="../Logout/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="perfil_adm.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="gerir_utilizador.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg> <span> Gerir Utilizador </span> </a> </li>

                    <li>
                        <a href="gerir_oferta_adm.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                            </svg> <span>Gerir Oferta</span></a>
                    </li>

                    <li>
                        <a href="inserir_area_adm.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                            </svg> <span>Gerir Area</span></a>
                    </li>


                    <li>
                        <a href="inserir_local_adm.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg><span>Gerir Local</span></a>
                    </li>

                    <li>
                        <a href="inserir_regime_adm.php"><i class="fa fa-clock-o"></i> <span>Gerir Regime</span></a>
                    </li>
                    <li>
                        <a href="inserir_habilitacao_adm.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                            </svg><span>Gerir Habilitações</span></a>
                    </li>
                    <li>
                        <a href="candidatura_adm.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                            </svg><span>Candidaturas</span></a>
                    </li>
                    <li>
                        <a href="dashbord12.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Inserir Oferta</h4>
                </div>

            </div>
            <form action="add_oferta.php" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="Titulo" class="form-control >
                                </div>
                                <div class="form-group">
                                        <label>Vagas</label>
                                        <input type="text" name="Vagas" class="form-control ">
                                    </div>

                                    <div class="form-group">
                                         <select class="custom-select d-block w-100" name="Utilizador_ID_utilizador" required>
                                        <option value="">Utilizador...</option>
                                        <?php
                                        require("../config.php");
                                        $link->set_charset("utf8");
                                        $consulta = 'SELECT * FROM utilizador';

                                        /* executar a sql e testar se ocorreu erro */
                                        if (!$resultado = $link->query($consulta)) {
                                            echo ' Falha na sql: '. $link->error;
                                            $link->close();  /* fechar a ligação */
                                        }
                                        else{
                                            while ($row = $resultado->fetch_assoc()) {

                                                ?>
                                                <option value=<?php echo $row['ID_utilizador'];?>><?php echo $row['Nome'];?></option>
                                                <?php
                                            }

                                        }
                                        ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label>Descrição</label>
                                        <input type="text" name="Descricao" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label>Categoria Salarial</label>
                                        <input type="text" name="Categoria_Salarial" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Regime_ID_regime" required>
                                            <option value="">Regime...</option>
                                            <?php
                                            require("../config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM regime';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_regime'];?>><?php echo $row['Regime'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Tipo_oferta_ID_tipo" required>
                                            <option value="">Tipo da oferta...</option>
                                            <?php
                                            require("../config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM tipo_oferta';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_tipo'];?>><?php echo $row['Tipo'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Local_ID_local" required>
                                            <option value="">Local de Trabalho...</option>
                                            <?php
                                            require("../config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM local';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_local'];?>><?php echo $row['Local'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Estado_oferta_ID_estado" required>
                                            <option value="">Estado...</option>
                                            <?php
                                            require("../config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM estado_oferta';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_estado'];?>><?php echo $row['Estado'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Area_ID_area" required>
                                            <option value="">Área...</option>
                                            <?php
                                            require("../config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM area';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_area'];?>><?php echo $row['Area'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Data de Criação</label>
                                        <input id="date" name="Data_Criacao" type="date" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label>Data de fim</label>
                                        <input id="date" name="Data_fim" type="date" class="form-control">
                                    </div>
                                    <button style="background-color: #1A2E46; color: #fff;" class="btn account-btn" type="submit">Submeter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>






            <div class="sidebar-overlay" data-reff=""></div>
            <script src="../assets/js/jquery-3.2.1.min.js"></script>
            <script src="../assets/js/popper.min.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>
            <script src="../assets/js/jquery.slimscroll.js"></script>
            <script src="../assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>