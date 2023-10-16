<?php 
//error_reporting(0); //poner slash para ver logs/errores de consola
session_start();
    if (isset($_SESSION['recovery_pass'])){
        header('Location: ../index.php');
    }
include_once '../backend/recovery_pass.php'

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Recuperar contraseña|DocMe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../frontend/css/login.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="icon" href="../img/logo-login.svg">
<body>
    <div class="contenedor">
        <img class="img-fluid logo-img" src="../img/logo-login.svg" alt="Logo DocMe">
        <div class="contenido-login">
            <form autocomplete="off" method="POST"  role="form">
            <?php
            if(isset($errMsg)){
                echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
            }
        ?>
            <h3>Recuperar contraseña</h3>

      

    <div class="input-div nit">
        <div class="div">
             <input type="text"  name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" placeholder="Correo">
        </div>
    </div>
    
    <button class="btn mb-4" name='recovery' type="submit"> Enviar Correo</button> 
    <span>¿Ya tienes cuenta? <a class="link" href="../index.php"> Inicia Sesión</a></span>
    <span>¿No tienes cuenta?<a class="signUp" href="../frontend/signup.php"> Registrate aquí</a></span>
    </form>

    </div>
    </div>
    <!-- Js personalizado -->
    
	
</body>

</html>
