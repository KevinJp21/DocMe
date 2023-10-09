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
            <form autocomplete="off" method="POST"  role="form" onsubmit="return validarFormulario();">
            <h3>Registro</h3>


            <div class="row">
    <div class="col-md-6">

    <div class="input-div">
        <div class="div">
             <input type="text"  name="name" required="true" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'] ?>" autocomplete="off" placeholder="Nombre">
        </div>
    </div>

    <div class="input-div">
        <div class="div">
            <input type="text" required="true" name="id" value="<?php if(isset($_POST['identificacion'])) echo $_POST['identificacion'] ?>" autocomplete="off" placeholder="Identificación" >
        </div>
    </div>
    </div>
    
    <div class="col-md-6">

    <div class="input-div">
        <div class="div">
        <input type="text" required="true" name="apellido" value="<?php if(isset($_POST['apellido'])) echo $_POST['apellido'] ?>" autocomplete="off" placeholder="Apellido" >
        </div>
    </div>

    <div class="input-div">
        <div class="div">
            <input type="text" required="true" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" placeholder="Nombre de usuario" >
        </div>
    </div>
    </div>
    <div class="col-md-6">

    <div class="input-div">
        <div class="div">
        <input type="password" required="true" id="pass" name="clave" value="<?php if(isset($_POST['clave'])) echo $_POST['clave'] ?>" autocomplete="off" placeholder="Contraseña" >
        </div>
    </div>

    <div class="input-div">
        <div class="div">
        <input type="password" required="true" id="conf_pass" name="conf-pass" autocomplete="off" placeholder="Confirmar contraseña" >
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
        <input type="text" required="true" name="numero" value="<?php if(isset($_POST['numero'])) echo $_POST['numero'] ?>" autocomplete="off" placeholder="Numero de celular" >
        </div>
    </div>
    </div>
    
    <div class="input-check">
    <span class="col-12">¿Tiene seguro?</span>
            <div class="safe">
            <label>
                <input type="radio" name="tiene_seguro" value="<?php if(isset($_POST['si'])) echo $_POST['si'] ?>"> Si
            </label>
            </div>
            <div class="safe">
            <label>
                <input type="radio" name="tiene_seguro" value="<?php if(isset($_POST['no'])) echo $_POST['no'] ?>"> No
            </label>
            </div>
        </div> 

        <div class="input-check mt-5">
    <span class="col-12">¿Tiene seguro?</span>
            <div class="safe">
            <label  class="me-5">
                <input type="radio" name="genero" id="masculino" value="<?php if(isset($_POST['masculino'])) echo $_POST['masculino'] ?>"> <span>Masculino</span>
            </label>
            </div>
            <div class="safe">
            <label  class="ms-5">
                <input  class="ms-5" type="radio" id="femenino" name="genero" value="<?php if(isset($_POST['femenino'])) echo $_POST['femenino'] ?>"> <span class="ms-5">Femenino</span> 
            </label>
            </div>
        </div> 

        <script>
            function validarFormulario() {
                var masculino = document.getElementById('masculino');
                var femenino = document.getElementById('femenino');

                if (!masculino.checked && !femenino.checked) {
                    alert('Por favor, seleccione su género.');
                    return false; // Evita que se envíe el formulario si no se selecciona un género
                }
                validarContraseña();
            }
        </script>

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