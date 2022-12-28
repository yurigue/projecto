<?php

require_once("../config.php");
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]!=2){
        header("location: perfil_candidato.php");
    }
}


if($_GET['acao'] == 'add') {
    $idyx1 = intval($_GET['id']);
}

require_once "../operacao.php";

$pdoConfig = require_once "../config.php";


?>


<!DOCTYPE html>
<html lang="en">


<!-- activities22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../imagem/logo1.png">
    <title>Câmara Distrital de Lobata</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<?php
//$cand = "SELECT *FROM utilizador WHERE Tipo_utilizador_ID_tipo = 1" ;

$id=$_SESSION["ID_utilizador"];
/* definir o charset utilizado na ligação */



$sql = "SELECT * FROM utilizador WHERE ID_utilizador = '$id'";
$result = $link->query($sql);


$bus= $result->fetch_assoc();
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

<body>
<div class="main-wrapper">
    <div class="header" style="background-color:#34512A">
        <div class="header-left">
            <a href="../index.php" class="logo">
                <img src="../imagem/logo1.png" width="120" height="40" alt=""> <span>LOBATA.EMPREGOS</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <?php
            //UPDATE candidatura SET visto='1' WHERE ID_candidatura='1';
            $query_1=" UPDATE candidatura SET visitado='1' WHERE ID_candidatura='$idyx1'  ";
            $query_1_run = mysqli_query($link,$query_1);
            //$row = mysqli_num_rows($query_1_run);


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

                                }


                                ?>

                        </ul>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"> <img class="rounded-circle" src="../imagem/<?php echo"$imagem" ?>" width="40" alt="">
							<span class="status online"></span></span>
                    <span><?php echo"$username" ?></span>
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
                <div class="col-sm-12">
                    <h4 class="page-title">Candidatura</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">

                            <tr>

                                <th>Nome</th>
                                <th>Titulo</th>
                                <th>Vagas</th>
                                <th>Categoria Salarial</th>
                                <th>Estado da candidatura</th>
                                <th>Data de Criação</th>
                                <th>Data de candidatura</th>
                                <th>Descrição</th>
                                <th>Mensagem</th>





                            </tr>


                            <?php
                            /* definir o charset utilizado na ligação */
                            $link->set_charset("utf8");

                            $candida_10="SELECT candidatura.*, utilizador.* , oferta.*, estado_candidatura.*   FROM candidatura inner join utilizador on candidatura.Utilizador_ID_utilizador = utilizador.ID_utilizador inner join oferta on candidatura.Oferta_ID_oferta = oferta.ID_oferta inner join estado_candidatura on candidatura.Estado_candidatura_ID_estado = estado_candidatura.ID_estado  WHERE  ID_candidatura IN (".$idyx1.")";

                            if($resul10=$link->query($candida_10)){

                                while ($row=$resul10->fetch_assoc()){
                                    echo'<tr> 
                                 <td><img width="28" height="28" src="../imagem/'.$row['Imagem'].'" class="rounded-circle m-r-5" alt=""> '.$row['Nome'].'</td>

 
              
                
          <td>'.$row['Titulo'].'</td>
            <td>'.$row['Vagas'].'</td>
             <td>'.$row['Categoria_Salarial'].'</td>
           <td>'.$row['Estado_Estado'].'</td>
            <td>'.$row['Data_Criacao'].'</td>
            <td>'.$row['Data'].'</td>
            <td>'.$row['Descricao'].'</td>
           <td>'.$row['Mensagem'].'</td>
            
             
             
            
   
            
            
            </tr>';
                                }
                                $resul10->free();
                                $link->close();
                            }


                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notification-box">
        <div class="msg-sidebar notifications msg-noti">
            <div class="topnav-dropdown-header">
                <span>Messages</span>
            </div>
            <div class="drop-scroll msg-list-scroll" id="msg_list">
                <ul class="list-box">
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">R</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Richard Miles </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item new-message">
                                <div class="list-left">
                                    <span class="avatar">J</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">John Doe</span>
                                    <span class="message-time">1 Aug</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">T</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Tarah Shropshire </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">M</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Mike Litorus</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">C</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Catherine Manseau </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">D</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Domenic Houston </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">B</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Buster Wigton </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">R</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Rolland Webber </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">C</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Claire Mapes </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">M</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Melita Faucher</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">J</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Jeffery Lalor</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">L</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Loren Gatlin</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">T</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Tarah Shropshire</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="chat.html">See all messages</a>
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


<!-- activities22:59-->
</html>