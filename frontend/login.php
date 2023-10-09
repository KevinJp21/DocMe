<?php 
session_start();
    if (isset($_SESSION['id'])){
        header('Location: administrador/escritorio.php');
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
    <link rel="stylesheet" href="../css/login.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="icon" href="../img/logo-login.svg">
<body>
    <div class="contenedor">
        <img class="img-fluid logo-img" src="../img/logo-login.svg" alt="Logo DocMe">
        <div class="contenido-login">
            <form autocomplete="off" method="POST"  role="form">
            <h3>Bienvenido a DocMe</h3>

    <div class="input-div nit">
        <div class="div">
             <input type="text"  name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" placeholder="Usuario">
        </div>
    </div>

    <div class="input-div pass">
        <div class="div">
            <input type="password" required="true" name="clave" value="<?php if(isset($_POST['clave'])) echo $_POST['clave'] ?>" placeholder="Contraseña" >
        </div>
    </div>
    
    <button class="btn" name='login' type="submit"> Iniciar sesion</button> 
    <a class="recovery-pass" href="#">¿Olvidaste tu contraseña?</a>
    <span>¿No tienes cuenta?<a class="signUp" href="../frontend/signup.php"> Registrate aquí</a></span>
    </form>

     <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>

    </div>
    </div>
    <!-- Js personalizado -->
    
	
</body>

</html>
