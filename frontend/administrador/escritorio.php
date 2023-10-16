<?php
session_start();

// Redirige al usuario a la página de inicio de sesión u otra página deseada
header('Location: ../login.php'); // Cambia 'inicio_sesion.php' al archivo al que deseas redirigir al usuario
session_destroy();
?>
