<?php
// Initialize the session
session_start();
ob_start();



?>
<!DOCTYPE html>
<html lang="pt-PT">


<!-- login23:11-->
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

    <style>
        a:hover{
            color: #34512A!important;
        }
        a:{color: #000!important;
        }
    </style>
</head>

<body>
<div class="main-wrapper account-wrapper" >
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><a style="color: #000000" href="../index.php">LOBATA.EMPREGOS</a>
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <?php
                    $dados=filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    $query_email="SELECT ID_utilizador, Nome, Email FROM  utilizador WHERE  Email=:Email LIMIT 1";
                    $result_email = $link->prepare($query_email);
                    $result_email->bind_param(':Email',$dados['Email'], PDO::PARAM_STR);
                    $result_email->execute();
                    if(($result_email) And ($result_email->rowCount()!=0) ){

                    }else{
                       $_SESSION['msg']= "<p style='color:#ff0000'>Erro: Email não encontrado! </p> ";
                    }
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <form action=""  method="post" class="form-signin">
                        <div class="account-logo">
                            <a href=""><img src="../imagem/logo1.png"  alt=""></a>
                        </div>
                            <label>E-mail </label>
                            <input type="text" name="Email" placeholder="O seu email"
                                   value="<?php if(isset($dados['Email'])){echo $dados['Email'];} ?>"
                                   class="form-control">

                        </div>


                        <div class="form-group text-center">
                            <button style="background-color: #34512A; color: #fff;" type="submit"  class="btn account-btn">Recuperar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</div>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>


