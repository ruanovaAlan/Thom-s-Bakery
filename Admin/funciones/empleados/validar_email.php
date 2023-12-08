<?php
require "../conecta.php";
$con = conecta();
$correo = $_POST['correo'];

$sql = "SELECT * FROM empleados WHERE correo = '$correo'";
$result = $con->query($sql);
$res = $result->fetch_array();
$num = $result->num_rows;
$id = $res['id'];

$data = array('num' => $num, 'id' => $id);
echo json_encode($data);

?>