<?php 
//error_reporting(0); //poner slash para quitar logs/errores de consola
session_start();
    if (isset($_SESSION['id'])){
        if($_SESSION['rol'] == '1'){
            header('Location: ../frontend/admin/dashboard.php');
        }else if($_SESSION['rol'] == '2'){
            header('Location: ../frontend/paciente/dashboard.php');
        }else{
            header('Location: ../index.php');
        }
    }
    
include_once '../backend/login.php'

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../frontend/css/login.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="icon" href="../img/logo-login.svg">
<body>
    <div class="contenedor">
        <img class="img-fluid logo-img" src="../img/logo_docme.svg" alt="Logo DocMe">
        <div class="contenido-login">
            <form autocomplete="off" method="POST"  role="form">
            <?php
            if(isset($errMsg)){
                echo '<div style="color:#FF0000;text-align:left;font-size:20px;">'.$errMsg.'</div>';  
            }
        ?>
            <h3>Bienvenido a DocMe</h3>
    <div class="input-div nit">
        <div class="div">
             <input type="text"  name="user_name" value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name'] ?>" autocomplete="off" placeholder="Usuario">
        </div>
    </div>

    <div class="input-div pass mb-5">
        <div class="div">
            <input  type="password" required="true" name="pass" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" placeholder="Contraseña" >
        </div>
    </div>
    
    <button class="btn" name='login' type="submit"> Iniciar sesion</button> 
    <a class="link" href="../frontend/recovery_pass.php">¿Olvidaste tu contraseña?</a>
    <span>¿No tienes cuenta?<a class="signUp" href="../frontend/signup.php"> Registrate aquí</a></span>
    </form>

    </div>
    </div>
    <!-- Js personalizado -->
    
	
</body>

</html>
