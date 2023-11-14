<?php
if (isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['user']);

    // Destruimos la sesión
    session_destroy();
    // Redireccionamos al usuario a la página de inicio de sesión
    header('Location: ../login.php');
    exit();
}
?>
