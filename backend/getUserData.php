<?php
function getUserData($userId) {
    global $connect;
    $stmt = $connect->prepare('SELECT nombre, apellido, identificacion, correo, telefono, user_name, rol FROM usuarios, roles WHERE id_usu = :userId AND usuarios.id_rol = roles.id_rol');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch();
    $userData = $result;
    return $userData;
}
?>