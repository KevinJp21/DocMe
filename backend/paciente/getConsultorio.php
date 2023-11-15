<?php
include '../config.php';

$idMed = $_POST['idMed'];

if ($idMed) {
    $stmt = $connect->prepare("SELECT Desc_Con FROM medicos m, consultorios c WHERE m.ID_Usu = :doctorID AND m.ID_Con = c.ID_Con");
    $stmt->bindParam(':doctorID', $idMed);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $consultorio = $result['Desc_Con'] ?? '';
} else {
    $consultorio = '';
}

echo $consultorio;