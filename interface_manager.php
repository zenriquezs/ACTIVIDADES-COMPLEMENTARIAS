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
$idInstructor = $_SESSION['ID_INSTRUCTOR'];

$sql = "SELECT * FROM VistaInstructor where id_instructor ='$idInstructor'";
$resultado = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu Instructor</title>
    <link rel="stylesheet" href="assets/css/styleManager.css">
    <link rel="stylesheet" href="assets/css/styleGaleria.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="navigation">
    <ul>
        <li class="list">
            <a href="interface_principal_instructor.html">
            <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
            </span>
                <span class="title">Ínicio</span>
            </a>
        </li>
        <li class="list active">
            <a href="interface_manager.php">
            <span class="icon">
                <ion-icon name="person-outline"></ion-icon>
            </span>
                <span class="title">Perfil</span>
            </a>
        </li>
        <li class="list">
            <a href="calificaciones.html">
            <span class="icon">
                <ion-icon name="mail-unread-outline"></ion-icon>
            </span>
                <span class="title">Calificaciones</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
            <span class="icon">
                <ion-icon name="settings-outline"></ion-icon>
            </span>
                <span class="title">Configuracion</span>
            </a>
        </li>
        <li class="list ">
            <a href="login_register.html">
            <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
            </span>
                <span class="title">Salir</span>
            </a>
        </li>
    </ul>
</div> 
<section>
    <div class="table-container">
        <table id="tablaInstriuctores" class="table" >
            <thead>
                <tr>
                    <th>ID_INSTRUCTOR</th>
                    <th>NOMBRE_COMPLETO_INSTRUCTOR</th>
                    <th>SEXO</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>USUARIO</th>
                    <th>TIPO_DE_USUARIO</th>
                    <th>PASSWORD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['ID_INSTRUCTOR']; ?></td>
                            <td><?php echo $row['NOMBRE_COMPLETO_INSTRUCTOR']; ?></td>
                            <td><?php echo $row['SEXO']; ?></td>
                            <td><?php echo $row['EMAIL']; ?></td>
                            <td><?php echo $row['TELEFONO']; ?></td>
                            <td><?php echo $row['USUARIO']; ?></td>
                            <td><?php echo $row['TIPO_DE_USUARIO']; ?></td>
                            <td><?php echo $row['PASSWORD']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<script src="assets/js/scriptManager.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
$conn->close();
?>