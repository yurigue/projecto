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




/*
   // $sql = "UPDATE utilizador SET Nome='Doe' WHERE ID_utilizador=29";
    $id=29;
    $username="yuri";
    $Nome='Yuri gue';
    $Email= "yuriunns@gmail.com";
    $sql = "UPDATE utilizador SET Nome='$Nome',Email='$Email' WHERE ID_utilizador=$id";
echo $sql;


    $result=mysqli_prepare($link, $sql);

    if (mysqli_query($link, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }

    mysqli_close($link);


    echo 'hhnjnjnjf';
*/


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

                                    }


                                    ?>
                            </ul>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle"  src="../imagem/<?php echo"$imagem" ?>" width="40" alt="">
							<span class="status online"></span></span>
                    <span><?php echo"$username"?></span>
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



    <?php

    /* Verificarmos  se foi enviado o pedido   */

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $ID_utilizador = filter_input(INPUT_GET, 'ID_utilizador');
        $operacao = filter_input(INPUT_GET, 'operacao');

        /* validar os dados recebidos através do pedido */
        if (empty($ID_utilizador) && $operacao!="Edit"){

            echo " Nada para editar!! ";
        }

    }
    else{ }




    /* estabelece a ligação à base de dados */
    require_once "../config.php";

    $utilizador = $_SESSION['ID_utilizador'];
    /* texto sql da sql*/
    $Edit = "SELECT * FROM utilizador  WHERE ID_utilizador ='$utilizador'";

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
                    <h4 class="page-title">Edição de Dados Pessoais </h4>
                </div>
                <form action="edit.php" method="POST" >

                    <fieldset>

                <a href="perfil_candidato.php"> <button style="background-color: #1A2E46; color: #fff;" class="btn account-btn">Cancelar</button></a>

                        <button style="background-color: #1A2E46; color: #fff;" class="btn account-btn" type="submit"  >Guardar Alterções</button>

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
                                                            <label>Nome de Utilizador</label>
                                                            <input class="form-control" type="text" name="x_username" value="<?=$row['Username']?>">
                                                        </div>
                                                        </div>


                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Nome <span class="text-danger"></span></label>
                                                                <input class="form-control" type="text" name="x_Nome" value="<?=$row['Nome']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Email<span class="text-danger"></span></label>
                                                                <input class="form-control" type="text" name="x_Email" value="<?=$row['Email']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Telefone<span class="text-danger"></span></label>
                                                                <input class="form-control" type="text" name="x_Telefone" placeholder="Insira um número de telefone" value="<?=$row['Telefone']?>">
                                                            </div>
                                                            <h3 class="page-title">Endereço Postal</h3>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Morada</label>
                                                                <input class="form-control " name="x_Morada" placeholder="Insira a sua morada"  value="<?=$row['Morada']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Código Postal</label>
                                                                <input class="form-control " name="x_Codigo_Postal" placeholder="Insira o seu código postal"  value="<?=$row['Codigo_Postal']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Localidade</label>
                                                                <input class="form-control " name="x_Localidade" placeholder="Insira a sua localidade"  value="<?=$row['Localidade']?>"type="text">
                                                            </div>
                                                    </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Nif</label>
                                                                <input class="form-control " name="x_Nif" placeholder="Insira o seu Nif"  value="<?=$row['Nif']?>"type="text">
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
<script src="../assets/js/app.js">

</script>
</body>


<!-- profile23:03-->
</html>