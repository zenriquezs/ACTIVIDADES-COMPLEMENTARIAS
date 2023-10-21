<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);


$id_alumno = $_POST['id_alumno'];
$query = "SELECT ID_COMPLEMENTARIAS, ID_ALUMNO, PERIODO, NIVEL_DE_DESEMPEÑO, NUMERO_DE_COMPLEMENTARIA FROM VISTA_CURSA_ALUMNO WHERE ID_ALUMNO='$id_alumno'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $matricula = $row['ID_ALUMNO'];
    $idComplementaria = $row['ID_COMPLEMENTARIAS'];
    $periodo = $row['PERIODO'];
    $numeroComplementaria = $row['NUMERO_DE_COMPLEMENTARIA'];
    $nivelDesempeño = $row['NIVEL_DE_DESEMPEÑO'];

    $datos = array(
        'matricula' => $matricula,
        'idComplementaria' => $idComplementaria,
        'periodo' => $periodo,
        'numeroComplementaria' => $numeroComplementaria,
        'nivelDesempeño' => $nivelDesempeño
    );

    echo json_encode($datos);
} else {
    echo "No se encontró al alumno en la vista de alumnos.";
    exit;
}

$conn->close();
?>
