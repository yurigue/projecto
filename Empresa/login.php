<?php
// Initialize the session
session_start();

// Check if the perfil_users is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"])){

}


// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$Email  = $password = "";
$Email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Check if username is empty
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Introduza o seu email.";
    } else{
        $Email = trim($_POST["Email"]);
    }



    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["Password"]);
    }

    // Validate credentials
    if(empty($Email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT empresa.ID_empresa, Email, Password FROM empresa  WHERE Email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Email);

            // Set parameters
            echo $param_Email;
            $param_Email = $Email;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store resultado
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind resultado variables

                    mysqli_stmt_bind_result($stmt, $id, $user, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                        if(password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["ID_empresa"] = $id;
                            $_SESSION["Email"] = $Email;

                                header("location: perfil_empresa.php");

                        }


                        else{
                            // Display an error message if password is not valid
                            $password_err = "A senha que você digitou não era válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Nenhuma conta encontrada com esse nome de utilizador.";
                }
            } else{
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }


        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);

}


?>
<!DOCTYPE html>
<html lang="pt-PT">


<!-- login23:11-->
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

    <style>
        a:hover{
            color: #1A2E46!important;
        }
        a:{color: #000!important;
        }
    </style>
</head>

<body>
<div class="main-wrapper account-wrapper" >
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><a style="color: #000000" href="../index.php">AJUDA.EMPREGOS</a>
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post" class="form-signin">
                        <div class="account-logo">
                            <a href=""><img src="../imagem/ajuda.png"  alt=""></a>
                        </div>
                        <div class="form-group <?php echo (!empty($Email_err)) ? 'erro no utilizador' : '';?>">
                            <label>Email </label>
                            <input type="text" name="Email" placeholder="O seu email" autofocus="" id="<?php echo $Email; ?>"
                                   class="form-control">
                            <span class=" help-block"><?php echo $Email_err; ?></span>

                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'erro no Password' : '';?>">
                            <label>Senha</label>
                            <input type="password" name="Password" placeholder="A sua senha"  id="<?php echo $password; ?>"
                                   class="form-control">
                            <span class="help-block "><?php echo $password_err; ?></span>

                        </div>

                        <div class="form-group text-center">
                            <button style="background-color: #1A2E46; color: #fff;" type="submit" class="btn account-btn">Entrar</button>
                        </div>
                        <div class="text-left register-link">
                            Não tens a conta? <a style="color: #000000" href="registo.php">Registra já</a>
                        </div>
                        <br>
                        <div class="text-right register-link">
                            <a style="color: #000000"  href="../Recuperar/recup_senha.php">Esqueceu a senha?</a>
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


