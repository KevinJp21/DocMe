<?php
include '../config.php';

// Retrieve the 'idMed' value from the POST data
$idMed = $_POST['idMed'];

if ($idMed) {
    $stmt = $connect->prepare("SELECT Descripcion FROM medicos m, especialidad esp WHERE m.ID_Usu = :doctorID AND m.ID_Esp = esp.ID_Esp");
    $stmt->bindParam(':doctorID', $idMed);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $especialidad = $result['Descripcion'] ?? '';
} else {
    $especialidad = '';
}

echo $especialidad;