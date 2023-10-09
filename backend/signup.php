<?php

require '../backend/config.php';





if (isset($_POST['signup'])) {
    $errMsg = '';

// Obtener los datos del formulario
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $ID = $_POST['ID'];
    $pass = MD5($_POST['password']);
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $phone_num = $_POST['phone_num'];

    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/', $name)) {
        $errMsg="Ingrese un nombre valido.";
    }elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/', $last_name)) {
        $errMsg="Ingrese un apellido valido.";
    }elseif (!preg_match('/^\d+$/', $ID)) {
        $errMsg="Ingrese una identificacion valida.";
    }elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $errMsg="Ingrese un correo valido.";
    }
    elseif (!preg_match('/^(?=.*[A-Za-z])[A-Za-z0-9]+$/', $user_name)) {
        $errMsg="Ingrese un nombre de usuario valido: se admiten caracteres y numeros pero no solo numeros.";
    }elseif (!preg_match('/^\d+$/', $phone_num)) {
        $errMsg="Ingrese un numero de celular valido.";
    }else{
        try {

            $sql = "INSERT INTO  usuarios(nombre, apellido, identificacion, correo, password, user, tel) VALUES (:name, :last_name, :ID, :email, :pass, :user_name, :phone_num)";
    
            $stmt = $connect->prepare($sql);
    
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':ID', $ID);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':phone_num', $phone_num);
    
            
            
            $stmt->execute();
            // Redirecciona a la página de inicio de sesión después del registro
            header('Location: ../frontend/login.php');
            exit();
        } catch (PDOException $e) {
            echo "Error de SQL: " . $e->getMessage();
        }
    } 
}
?>