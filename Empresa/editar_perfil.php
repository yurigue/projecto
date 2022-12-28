<?php
require_once("../config.php");
session_start();
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


<?php
//$cand = "SELECT *FROM utilizador WHERE Tipo_utilizador_ID_tipo = 1" ;

$id=$_SESSION["ID_empresa"];
/* definir o charset utilizado na ligação */



$sql = "SELECT * FROM empresa WHERE ID_empresa = '$id'";
$result = $link->query($sql);

$bus= $result->fetch_assoc();
$Nome  = $bus['Nome'];
$Nif  = $bus['Nif'];
$Telefone = ( $bus['Telefone']);
$Email  = $bus['Email'];
$Morada  = $bus['Morada'];
$imagem = $bus['Imagem'];



?>


<body>


<div class="main-wrapper">
    <div class="header" style="background-color:#1A2E46">
        <div class="header-left">
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

                                $candida_10="SELECT candidatura.*, utilizador.* , oferta.*, estado_candidatura.*   FROM candidatura inner join utilizador on candidatura.Utilizador_ID_utilizador = utilizador.ID_utilizador inner join oferta on candidatura.Oferta_ID_oferta = oferta.ID_oferta inner join estado_candidatura on candidatura.Estado_candidatura_ID_estado = estado_candidatura.ID_estado where visto ='0' ";

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
                    <span><?php echo"$Nome" ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil_empresa.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                    <a class="dropdown-item" href="../Logout/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_empresa.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
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
                        <a href="perfil_empresa.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="gerir_oferta.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                            </svg> <span>Gerir Oferta</span></a>
                    </li>

                    <li>
                        <a href="gerir_candidatura.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                            </svg><span>Candidaturas</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <?php

    /* Verificarmos  se foi enviado o pedido   */

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = filter_input(INPUT_GET, 'id');
        $operacao = filter_input(INPUT_GET, 'operacao');

        /* validar os dados recebidos através do pedido */
        if (empty($id) && $operacao!="Edit"){

            echo " Nada para editar!! ";
        }

    }
    else{ }




    /* estabelece a ligação à base de dados */
    require_once "../config.php";

    $empresa = $_SESSION['ID_empresa'];
    /* texto sql da sql*/
    $Edit = "SELECT  empresa.*, area.*, local.*  FROM empresa inner join area on empresa.Area_ID_area = area.ID_area inner join local on empresa.Local_ID_local = local.ID_local where ID_empresa = '$empresa'";

    /* executar a sql e testar se ocorreu erro */
    if (!$resultado = $link->query($Edit)) {
        echo ' Falha na sql: '. $link->error;
        $link->close();  /* fechar a ligação */
    }
    else {
        /* buscar os dados do registo */
        $row = $resultado->fetch_assoc();
    }
    ?>


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Edição de Dados Própios </h4>
                </div>
                <form action="edit_emp.php" method="POST" class="form-signin">


                    <fieldset>

                        <a href="perfil_empresa.php"> <button style="background-color: #1A2E46; color: #fff;" class="btn account-btn">Cancelar</button></a>

                        <button style="background-color: #1A2E46; color: #fff;" class="btn account-btn" type="submit"  >Guardar alterações</button>

                        <div class="card-box profile-header">
                            <div class="row">
                                <div class="col-md-15">
                                    <div class="profile-view">

                                        <div class="page-wrapper">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-lg-8 offset-lg-2">

                                                        <h3 class="page-title">Contactos</h3>
                                                        <div class="row">

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Nome <span class="text-danger"></span></label>
                                                                    <input class="form-control" type="text" name="e_Nome" value="<?=$row['Nome']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Email<span class="text-danger"></span></label>
                                                                    <input class="form-control" type="text" name="e_Email" value="<?=$row['Email']?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Nif</label>
                                                                    <input class="form-control " name="e_Nif" value="<?=$row['Nif']?>" type="text">
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Área</label>
                                                                    <select class="custom-select d-block w-100"  name="e_Area_ID_area" >

                                                                        <option value=<?=$row['ID_area']?> selected><?= $row['Area']?></option>
                                                                        <?php
                                                                        require("../config.php");
                                                                        $link->set_charset("utf8");
                                                                        $tp=$row['ID_area'];
                                                                        $consulta = "SELECT * FROM area where ID_area!=$tp";

                                                                        /* executar a consulta e testar se ocorreu erro */
                                                                        if (!$resultado = $link->query($consulta)) {
                                                                            echo ' Falha na consulta: '. $link->error;
                                                                            $link->close();  /* fechar a ligação */
                                                                        }
                                                                        else{
                                                                            while ($rowss = $resultado->fetch_assoc()) {

                                                                                ?>
                                                                                <option value=<?= $rowss['ID_area']?>><?= $rowss['Area']?></option>
                                                                                <?php
                                                                            }

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Telefone<span class="text-danger"></span></label>
                                                                    <input class="form-control" type="text" name="e_Telefone" value="<?=$row['Telefone']?>">
                                                                </div>
                                                                <h3 class="page-title">Endereço Postal</h3>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Morada</label>
                                                                    <input class="form-control " name="e_Morada" value="<?=$row['Morada']?>" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Localidade</label>
                                                                    <select class="custom-select d-block w-100"  name="e_Local_ID_local" >

                                                                        <option value=<?=$row['ID_local']?> selected><?= $row['Local']?></option>
                                                                        <?php
                                                                        require("../config.php");
                                                                        $link->set_charset("utf8");
                                                                        $tp=$row['ID_local'];
                                                                        $consulta = "SELECT * FROM local where ID_local!=$tp";

                                                                        /* executar a consulta e testar se ocorreu erro */
                                                                        if (!$resultado = $link->query($consulta)) {
                                                                            echo ' Falha na consulta: '. $link->error;
                                                                            $link->close();  /* fechar a ligação */
                                                                        }
                                                                        else{
                                                                            while ($rowss = $resultado->fetch_assoc()) {

                                                                                ?>
                                                                                <option value=<?= $rowss['ID_local']?>><?= $rowss['Local']?></option>
                                                                                <?php
                                                                            }

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>



                                                        </div>
                    </fieldset>
                </form>
                <?php

                $resultado->free();/* libertar o resultado! */
                $link->close();     /* fecha a ligação! */


                ?>
            </div>
        </div>
    </div>

</div>


</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>