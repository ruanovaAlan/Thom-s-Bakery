<?php

require "./conecta.php";
$con = conecta();
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$passEnc = md5($pass);

$sql = "SELECT * FROM empleados WHERE correo = '$correo' 
AND pass = '$passEnc' AND status = 1 AND eliminado = 0";

$result = $con->query($sql);
$count = $result->num_rows;

if ($count == 1) {
    session_start();
    $row = $result->fetch_array();
    $id = $row["id"];
    $nombre = $row["nombre"] . ' ' . $row["apellidos"];
    $correoUsuario = $row["correo"];

    $_SESSION['idUser'] = $id;
    $_SESSION['nombreUser'] = $nombre;
    $_SESSION['correoUser'] = $correoUsuario;
}

echo $count;
?>