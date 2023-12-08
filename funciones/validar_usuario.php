<?php

require "conecta.php";
$con = conecta();
$correo = $_POST['correo'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM clientes WHERE correo = '$correo' 
AND pass = '$pass'";

$result = $con->query($sql);
$count = $result->num_rows;

if ($count == 1) {
    session_start();
    $row = $result->fetch_array();
    $id = $row["id"];
    $nombre = $row["nombre"];
    $correoUsuario = $row["correo"];

    $_SESSION['idUser'] = $id;
    $_SESSION['nombreUser'] = $nombre;
    $_SESSION['correoUser'] = $correoUsuario;
}

echo $count;
?>