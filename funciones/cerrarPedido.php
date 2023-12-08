<?php
    require "conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $sql = "UPDATE pedidos SET status = 1 WHERE id_cliente = '$id' AND status = 0";
    $res = $con->query($sql);
?>