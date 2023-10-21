<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
echo "Conexión exitosa!";

if(isset($_POST['usuarioLog']) && isset($_POST['passwordLog'])) {
    $user = $_POST['usuarioLog'];
    $pass = $_POST['passwordLog'];
    if(empty($user) || empty($pass)) {
        $_SESSION['mensaje_error'] = "Por favor, completa todos los campos.";
        header("Location: ../../login_register.html");
        exit;
    }
    $sql = "SELECT PASSWORD, USUARIO, TIPO_DE_USUARIO, ID_ALUMNO, ID_INSTRUCTOR,ID_COMPLEMENTARIA,ID_COMPLEMENTARIAS FROM VistaUsuarioTipoLoginConComplementaria WHERE USUARIO = '$user' AND PASSWORD = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tipoUsuario = $row["TIPO_DE_USUARIO"];

        if ($tipoUsuario == "Alumno") {
            $idAlumno = $row["ID_ALUMNO"];
            $_SESSION['ID_ALUMNO'] = $idAlumno;
            header("Location: ../../interface_Student.html");
            exit;
        } elseif ($tipoUsuario == "Instructor") {
             $idInstructor = $row["ID_INSTRUCTOR"];
            $_SESSION['ID_INSTRUCTOR'] = $idInstructor;
            //$idComplementarias = $row["ID_COMPLEMENTARIA"];
            header("Location: ../../interface_principal_instructor.html");
            exit;
        } else {
            $_SESSION['mensaje_error'] = "Rol de usuario desconocido.";
            header("Location: ../../login_register.html");
            exit;
        }
    } else {
        $_SESSION['mensaje_error'] = "Usuario o contraseña incorrectos. Verifica tus credenciales.";
        header("Location: ../../login_register.html");
        exit;
    }
}
$conn->close();
?>