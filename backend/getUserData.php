<?php
function getUserData($userId) {
    global $connect;
    $stmt = $connect->prepare('SELECT nombre, apellido, user FROM usuarios WHERE id_user = :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch();
    $userData = $result;
    return $userData;
}
?>