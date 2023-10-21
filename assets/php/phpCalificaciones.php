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
$idInstructor = $_SESSION['ID_INSTRUCTOR'];

$sql = "SELECT * FROM vista_combinada WHERE ID_INSTRUCTOR = '$idInstructor'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

echo json_encode($data);
?>
