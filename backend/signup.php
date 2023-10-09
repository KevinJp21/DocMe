<?php
require '../backend/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    // Obtén los datos del formulario
    $nombre = $_POST['name'];
    $apellido = $_POST['apellido'];
    $identificacion = $_POST['id'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $numero = $_POST['numero'];
    $tiene_seguro = isset($_POST['tiene_seguro']) ? $_POST['tiene_seguro'] : 'No'; // Valor predeterminado si no se selecciona seguro
    $genero = isset($_POST['genero']);

    // Realiza la inserción en la base de datos (cambia la consulta y la conexión según tu configuración)
    try {

        $sql = "INSERT INTO usuarios (dnipa, nombrep, apellidop, seguro, tele, sexo, usuario, clave, cargo, estado, fecha_create) VALUES (:identificacion, :nombre, :apellido, :tiene_seguro, :numero, :genero, :usuario, :clave, 2, 1, '2023-10-04 11:38:57')";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':tiene_seguro', $tiene_seguro);
        $stmt->bindParam(':genero', $genero);


        $stmt->execute();

        // Redirecciona a la página de inicio de sesión después del registro
        header('Location: ../login.php');
        exit();
    } catch (PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>