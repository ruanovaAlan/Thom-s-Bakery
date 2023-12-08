<?php
require "../conecta.php";
$con = conecta();
$codigo = $_POST['codigo'];

$sql = "SELECT * FROM productos WHERE codigo = '$codigo'";
$result = $con->query($sql);
$num = $result->num_rows;

echo $num;
?>