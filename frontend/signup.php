<?php 
session_start();
    if (isset($_SESSION['identificacion'])){
        header('Location: ../frontend/signup.php');
    }
include_once '../backend/signup.php'

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signup.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    
</head>
<body>
    <div class="contenedor">
        <img class="img-fluid logo-img" src="../img/logo-login.svg" alt="Logo DocMe">
        <div class="contenido-login">
            <form autocomplete="off" method="POST"  role="form" onsubmit="return validarContraseña();">
            <h3>Registro</h3>
            <?php
                if(isset($errMsg)){
                    echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
                }
            ?>
            
            
            <div class="row">
    <div class="col-md-6">

    <div class="input-div">
        <div class="div">
             <input type="text"  name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>" autocomplete="off" placeholder="Nombre">
        </div>
    </div>

    <div class="input-div">
        <div class="div">
            <input type="text"  name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'] ?>" autocomplete="off" placeholder="Apellido" >
        </div>
    </div>
    </div>
    
    <div class="col-md-6">

    <div class="input-div">
        <div class="div">
        <input type="text"  name="ID" value="<?php if(isset($_POST['ID'])) echo $_POST['ID'] ?>" autocomplete="off" placeholder="Identificacion" >
        </div>
    </div>

    <div class="input-div">
        <div class="div">
            <input type="email"  name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" placeholder="Correo" >
        </div>
    </div>
    </div>
    <div class="col-md-6">

    <div class="input-div">
        <div class="div">
        <input type="password"  id="pass" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" placeholder="Contraseña" >
        </div>
    </div>

    <div class="input-div">
        <div class="div">
        <input type="password"   id="conf_pass" name="conf_password" value="<?php if(isset($_POST['conf_password'])) echo $_POST['conf_password'] ?>" autocomplete="off" placeholder="Confirmar contraseña" >
        </div>
    </div>
    

    <script>
            function validarContraseña() {
                var pass = document.getElementById('pass').value;
                var conf_pass = document.getElementById('conf_pass').value;

                if (pass !== conf_pass) {
                    alert('Las contraseñas deben ser iguales en ambos campos.');
                    return false; // Evita que se envíe el formulario si las contraseñas no coinciden
                }
                return true;
    }
        </script>


    </div>

    <div class="col-md-6">
    <div class="input-div">
        <div class="div">
        <input type="text"  name="user_name" value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name'] ?>" autocomplete="off" placeholder="Nombre de usuario" >
        </div>
    </div>

    <div class="input-div">
        <div class="div">
        <input type="text"  name="phone_num" value="<?php if(isset($_POST['phone_num'])) echo $_POST['phone_num'] ?>" autocomplete="off" placeholder="Numero de celular" >
        </div>
    </div>
    </div>

    

    <div class="btn-signup">
    <button class="btn" name='signup' type="submit">Registrarse</button> 
    </div>
    
    <a class="recovery-pass" href="#">¿Olvidaste tu contraseña?</a>
    <span>¿Ya tienes cuenta? <a class="signUp" href="../index.php"> Inicia Sesión</a></span>
    </form>

     <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- Js personalizado -->
</body>

</html>