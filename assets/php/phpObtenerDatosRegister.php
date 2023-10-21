<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

$idAlumno = $_SESSION['ID_ALUMNO'];
$query = "SELECT ID_ALUMNO, NOMBRE_COMPLETO_ALUMNO FROM vista_alumnos WHERE ID_ALUMNO='$idAlumno'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $matricula = $row['ID_ALUMNO'];
    $nombreCompleto = $row['NOMBRE_COMPLETO_ALUMNO'];
    
    $datos = array(
        'matricula' => $matricula,
        'nombreCompleto' => $nombreCompleto
    );

    echo json_encode($datos); 
} else {
    echo "No se encontró al alumno en la vista de alumnos.";
    exit;
}

$conn->close();
?>
