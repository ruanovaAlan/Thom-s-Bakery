<?php
$to = "alanruasanchez@gmail.com";
$subject = "Contacto desde la página web";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$comentarios = $_POST["comentarios"];
$message = "Nombre: $nombre $apellidos\nCorreo: $correo\nComentarios: $comentarios";

$headers = "From: alanruasanchez@gmail.com";

mail($to, $subject, $message, $headers);

header("Location: ../index.php");    


?>