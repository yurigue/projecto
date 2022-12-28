<?php
require_once("../config.php");
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../imagem/ajuda.png">
    <title>Ajuda.Empregos</title>t
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<?php
//$cand = "SELECT *FROM utilizador WHERE Tipo_utilizador_ID_tipo = 2" ;

$id=$_SESSION["ID_utilizador"];
/* definir o charset utilizado na ligação */



$sql = "SELECT utilizador.*, habilitacao.*   FROM utilizador inner join habilitacao on utilizador.Habilitacao_ID_habilitacao =habilitacao.ID_habilitacao WHERE ID_utilizador = '$id'";
$result34 = $link->query($sql);


$bus= $result34->fetch_assoc();
$Nome  = $bus['Nome'];
$username  = $bus['Username'];
$Telefone = ( $bus['Telefone']);
$Email  = $bus['Email'];
$Morada  = $bus['Morada'];
$Localidade  = $bus['Localidade'];
$cp = $bus['Codigo_Postal'];
$Nif = $bus['Nif'];
$imagem = $bus['Imagem'];
$cv= $bus['CV'];
$Bi= $bus['Bi'];
$Habilitacao= $bus['Habilitacao'];










?>
<body>
<div class="main-wrapper">
    <div  class="header" style="background-color:#1A2E46">
        <div class="header-left">
            <a href="../index.php" class="logo">
                <img src="../imagem/ajuda.png" width="120" height="40" alt=""> <span>AJUDA.EMPREGOS</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <?php
            $id_11=$_SESSION["ID_utilizador"];
            $query ="SELECT * FROM candidatura  WHERE (Estado_candidatura_ID_estado='1' or Estado_candidatura_ID_estado='2')  and (Utilizador_ID_utilizador='$id_11' and visitado='0' )  ORDER BY ID_candidatura DESC";
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
                                $id_1=$_SESSION["ID_utilizador"];
                                $candida_1="SELECT candidatura.*, utilizador.* , oferta.*, estado_candidatura.*   FROM candidatura inner join utilizador on candidatura.Utilizador_ID_utilizador = utilizador.ID_utilizador inner join oferta on candidatura.Oferta_ID_oferta = oferta.ID_oferta inner join estado_candidatura on candidatura.Estado_candidatura_ID_estado = estado_candidatura.ID_estado where (Estado_candidatura_ID_estado='1' or Estado_candidatura_ID_estado='2') and ID_utilizador= '$id_1'";

                                if($resultado=$link->query($candida_1)){

                                    while ($row=$resultado->fetch_assoc()){
                                        echo'<tr> 
                                <a href="notificacao_cand.php?acao=add&id='.$row['ID_candidatura'].'">
                                    <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="../imagem/'.$row['Imagem'].'" class="img-fluid">
											</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">'.$row['Nome'].'</span> O estado da  sua candidatura a oferta <span class="noti-title">'.$row['Titulo'].'</span></p>
                                            <p class="noti-time"><span class="notification-time">'.$row['Estado_Estado'].'</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
            </tr>';
                                    }
                                    $resultado->free();
                                    $link->close();
                                }


                                ?>
                        </ul>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../imagem/<?php echo"$imagem" ?>" width="40" alt="">
							<span class="status online"></span></span>
                    <span><?php echo"$username" ?> </span>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil_candidato.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                    <a class="dropdown-item" href="../Logout/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_candidato.php">Meu Perfil</a>
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
                        <a href="perfil_candidato.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>

                    <li>
                        <a href="oferta_de_emprego_cand.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                            </svg> <span>Ofertas Emprego</span></a>
                    </li>
                    <li>
                        <a href="as_m_candi_cand.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                            </svg> <span>Candidaturas</span></a>
                    </li>

                    <li>
                        <a href="inserir_habilitacao.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                            </svg><span>Inserir Habilitação</span></a>
                    </li>


                </ul>
            </div>
        </div>
    </div>


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Identificação</h4>
                </div>

            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href=""><img  class="avatar" src="../imagem/<?php echo"$imagem" ?>" alt=""> </a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo"$Nome" ?>  </h3>
                                        </div>
                                        &ensp;&ensp; <a href="editar_foto_cand.php">Carregar foto
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg></a>
                                        &ensp;&ensp;
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Telemóvel:</span>
                                                <span class="text"> <?php echo"$Telefone" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"> <?php echo"$Email" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Morada:</span>
                                                <span class="text"> <?php echo"$Morada" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Codigo postal:</span>
                                                <span class="text"><?php echo"$cp" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Localidade:</span>
                                                <span class="text"><?php echo"$Localidade" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">NIF:</span>
                                                <span class="text"><?php echo"$Nif" ?> </span>
                                            <li/>

                                            <li>
                                                <span class="title">Habiltação:</span>
                                                <span class="text"><?php echo"$Habilitacao" ?> </span>
                                            <li/>

                                            <li>
                                                <span class="title">BI:</span>
                                                <span class="text"><?php echo"$Bi" ?> </span>
                                            <li/>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Sobre</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <a href="cv_cand.php">     <i class="fa fa-book"></i> <span>Curriculum Vitae (CV)</span></a>

                                    <div class="experience-box">
                                        <ul class="experience-list">

                                            <li>

                                                <div class="experience-content">
                                                    <div class="timeline-content">

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