<?php
    require "../conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "UPDATE promociones SET eliminado = 1, status = 0 where id = $id";
    $res = $con->query($sql);

    header("Location: ../../views/promociones/lista_promociones.php");

?>