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
} else {
    echo "No se encontró al alumno en la vista de alumnos.";
    exit;
}
$datos = array(
    'matricula' => $matricula,
    'nombreCompleto' => $nombreCompleto
);

echo json_encode($datos);

$nombreComplement = $_POST['Nombre-actividad-Complementaria'];
$periodo = $_POST['periodo'];
$numeroComplementaria = $_POST['numero_complementaria'];
$variableDesempeño= 'Asignar Desempeño';
$query = "CALL InsertarEnCursa('$nombreComplement', '$matricula', '$periodo', null, '$numeroComplementaria')";

if ($conn->query($query)) {
    echo "Registro exitoso. El alumno ha sido insertado en la base de datos.";
    
    header("Location: ../../interface_Student.html");
} else {
    echo "Error al registrar al alumno: " . $conn->error;
}

$conn->close();

?>
