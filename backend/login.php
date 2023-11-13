<?php
require '../backend/config.php';
if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $user_name = $_POST['user_name'];
    $pass = $_POST['pass'];

    //Comprobar campos

    if($user_name == '')
      $errMsg = 'Digite su usuario';
    if($pass == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
        $stmt = $connect->prepare('SELECT id_usu, nombre, correo, password, user_name  FROM usuarios WHERE user_name = :user_name');
        $stmt->execute(array(
          ':user_name' => $user_name
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "Usuario $user_name no encontrado.";
        }
        else {
          if($pass == $data['password']) {

            $_SESSION['id'] = $data['id_usu'];
            $_SESSION['name'] = $data['nombre'];
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['email'] = $data['correo'];
            $_SESSION['pass'] = $data['password'];
            
            
            
    if($data['id_rol'] == 1){
          header('location: ../frontend/admin/dashboard.php');
        }//coninuar con los demas roles
          }
          else
            $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
  

?>