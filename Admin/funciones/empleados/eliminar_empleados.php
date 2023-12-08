<?php
    require "../conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "UPDATE empleados SET eliminado = 1, status = 0 where id = $id";
    $res = $con->query($sql);

    header("Location: ../../views/empleados/lista_empleados.php");

?>