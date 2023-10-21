<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

$matricula = $_POST['Matricula'];
$nombreCompleto = $_POST['NombreCompleto'];
$genero = $_POST['Genero'];
$correoElectronico = $_POST['CorreoElectronico'];
$telefono = $_POST['Telefono'];
$carrera = $_POST['Carrera'];
$tipoUsuario = $_POST['Tipo_de_Usuario'];
$usuario = $_POST['Usuario'];
$contrasena = $_POST['Contrasena'];

$query = "CALL SP_INSERTAR_ALUMNO('$matricula', '$nombreCompleto', '$genero', '$correoElectronico', '$telefono', '$usuario', '$tipoUsuario', '$contrasena', '$carrera')";

if ($conn->query($query)) {
    echo "Registro exitoso. El alumno ha sido insertado en la base de datos.";
    header("Location: ../../login_register.html");
} else {
    echo "Error al registrar al alumno: " . $conn->error;
}

$conn->close();

?>
