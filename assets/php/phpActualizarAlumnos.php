<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

$matricula = $_POST['Matricula'];
$periodo = $_POST['periodo'];
$nivelDesempeno = $_POST['nivel-de-desempeno'];
$numeroComplementaria = $_POST['numero_complementaria'];

if (isset($matricula) && isset($periodo) && isset($nivelDesempeno) && isset($numeroComplementaria)) {
    $query = "CALL ActualizarCursaPorIDAlumno('$periodo', '$nivelDesempeno', '$numeroComplementaria', $matricula)";

    if ($conn->query($query) === TRUE) {
        echo "Datos actualizados con éxito.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
} else {
    echo "Campos no enviados correctamente.";
}

$conn->close();
?>
 