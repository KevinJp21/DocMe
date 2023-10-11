<?php
session_start();

include_once '../backend/config.php';

$errMsg = '';

// Verificamos si el formulario ha sido enviado.
if (isset($_POST['change_pass'])) {
    // Obtenemos la nueva contraseña del usuario.
    $new_pass = $_POST['new_pass'];
    $conf_new_pass = $_POST['conf_new_pass'];

    // Validamos la nueva contraseña.
    if ($new_pass != $conf_new_pass) {
        $errMsg = 'Las contraseñas no coinciden.';
    } else {
        // Hash la nueva contraseña.
        $hashed_password = $new_pass;

        $token = $_GET['token']; 

        $sql = 'UPDATE usuarios SET password = :password, password_reset_token = "" WHERE password_reset_token = :token';// Esta consulta actualiza la contraseña y elimina el token de recuperacion
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':password', $hashed_password);
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $errMsg = "Contraseña actualizada";
        } else {
            $errMsg = "No has solicitado cambiar tu contraseña";
        }
    }
}
?>