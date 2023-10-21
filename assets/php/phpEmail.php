<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

$id_alumno = $_POST['id_alumno'];
$query = "SELECT EMAIL,NOMBRE_COMPLETO_ALUMNO,ID_COMPLEMENTARIAS, ID_ALUMNO,PERIODO,NIVEL_DE_DESEMPEÑO, NUMERO_DE_COMPLEMENTARIA, NOMBRE_COMPLETO_INSTRUCTOR, NOMBRE_CARRERA FROM VistaEmailAlumnoComplementariasFormatoLiberacion WHERE ID_ALUMNO = '$id_alumno';";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $matricula = $row['ID_ALUMNO'];
    $idComplementaria = $row['ID_COMPLEMENTARIAS'];
    $periodo = $row['PERIODO'];
    $numeroComplementaria = $row['NUMERO_DE_COMPLEMENTARIA'];
    $nivelDesempeño = $row['NIVEL_DE_DESEMPEÑO'];
    $email= $row['EMAIL'];
    $nombreAlumno=$row['NOMBRE_COMPLETO_ALUMNO'];
    $nombreInstructor=$row['NOMBRE_COMPLETO_INSTRUCTOR'];
    $nombreCarrera=$row['NOMBRE_CARRERA'];

    $destinatario = $email;

    
    $asunto = "Formato de Complementaria para $nombreAlumno";
    $mensaje = "Estimado $nombreInstructor,\n\n";
    $mensaje .= "Soy $nombreAlumno con la matricula de $matricula , estudiante de la carrera $nombreCarrera en el periodo $periodo. ";
    $mensaje .= "Le escribo para solicitar la liberación de la complementaria $numeroComplementaria " ;
    $mensaje .= "Mi nivel de desempeño es $nivelDesempeño.\n\n";
    $mensaje .= "Espero su respuesta.\n\n";
    $mensaje .= "Atentamente,\n$nombreAlumno";

    $smtpUsuario = "zenrizu@gmail.com";
    $smtpPassword = "mifh crya yvqq funj";

    $headers = "From: $smtpUsuario\r\n";
    $headers .= "Reply-To: $smtpUsuario\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "Correo enviado con éxito";
    } else {
        echo "No se pudo enviar el correo";
    }
} else {
    echo "No se encontró al alumno en la vista de alumnos.";
    exit;
}
?>
