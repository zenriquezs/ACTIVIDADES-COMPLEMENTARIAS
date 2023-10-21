<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['id_alumno'])) {
    $id_alumno = $_POST['id_alumno'];
    $sql = "CALL EliminarAlumno(?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $id_alumno);
        if ($stmt->execute()) {
            echo "Alumno eliminado con éxito.";
        } else {
            echo "Error al ejecutar el procedimiento almacenado: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la sentencia: " . $conn->error;
    }
} else {
    echo "ID del alumno no especificado en la solicitud POST.";
}
$conn->close();
?>
