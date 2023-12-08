<?php
    require "../conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "UPDATE productos SET eliminado = 1, status = 0 where id = $id";
    $res = $con->query($sql);

    header("Location: ../../views/productos/lista_productos.php");

?>