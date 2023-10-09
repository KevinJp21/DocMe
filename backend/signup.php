<?php

require '../backend/config.php';
$errMsg = '';

if (isset($_POST['signup'])) {
    // Obtén los datos del formulario
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $ID = $_POST['ID'];
    $pass = MD5($_POST['password']);
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $phone_num = $_POST['phone_num'];

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
?>