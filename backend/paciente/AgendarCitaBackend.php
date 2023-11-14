<?php
session_start();
include '../../backend/dashboard.php';
include '../../backend/getUserData.php';
include '../../backend/config.php';
$citasDisponibles = obtenerCitasDisponibles(); 



// ejemplo
$html = '<h4>Citas Disponibles:</h4>';
$html .= '<table class="table table-striped">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>ID Cita</th>';
$html .= '<th>Fecha Cita</th>';
$html .= '<th>Motivo</th>';
$html .= '<th>Estado</th>';
$html .= '<th>ID Paciente</th>';
$html .= '<th>ID Médico</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

foreach ($citasDisponibles as $cita) {
    $html .= '<tr>';
    $html .= '<td>' . $cita['ID_Cita'] . '</td>';
    $html .= '<td>' . $cita['FechaCita'] . '</td>';
    $html .= '<td>' . $cita['Motivo'] . '</td>';
    $html .= '<td>' . $cita['Estado'] . '</td>';
    $html .= '<td>' . $cita['ID_Paciente'] . '</td>';
    $html .= '<td>' . $cita['ID_Med'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';


echo $html;



?>
