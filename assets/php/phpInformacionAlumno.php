<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
if(isset($_SESSION['ID_ALUMNO'])) {
    $idAlumno = $_SESSION['ID_ALUMNO'];

    $sql = "SELECT * FROM VistaAlumno WHERE ID_ALUMNO= '$idAlumno'";

    $result = $conn->query($sql);

    $alumnos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $alumnos[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($alumnos);
} else {

    echo "ID de alumno no encontrado en la sesión.";
}

$conn->close();
?>

