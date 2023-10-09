<?php
require '../backend/config.php';
if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    //Comprobar campos

    if($usuario == '')
      $errMsg = 'Digite su usuario';
    if($clave == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, nombre, usuario, email,clave, cargo FROM usuarios WHERE usuario = :usuario UNION SELECT codpaci, nombrep,apellidop, usuario, clave, cargo FROM customers WHERE usuario = :usuario');


        $stmt->execute(array(
          ':usuario' => $usuario
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "Usuario $usuario no encontrado.";
        }
        else {
          if($clave == $data['clave']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['clave'] = $data['clave'];
            $_SESSION['cargo'] = $data['cargo'];
            
            
            
    if($_SESSION['cargo'] == 1){
          header('Location: #');
        }else if($_SESSION['cargo'] == 2){
          header('Location: #');
        }
        
        
            exit;
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