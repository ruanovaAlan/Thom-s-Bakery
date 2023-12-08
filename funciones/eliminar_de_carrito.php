<?php
    session_start();
    require "conecta.php";
    $con = conecta();

    $id_cliente = $_POST['id_cliente'];
    $id_producto = $_POST['id_producto'];

    $sql = "DELETE FROM pedidos_productos WHERE id_pedido IN (SELECT id FROM pedidos WHERE id_cliente = '$id_cliente' AND status = 0) AND id_producto = '$id_producto'";
    $res = $con->query($sql);

    $sql = "SELECT * FROM pedidos_productos
    INNER JOIN productos ON pedidos_productos.id_producto = productos.id
    INNER JOIN pedidos ON pedidos_productos.id_pedido = pedidos.id
    WHERE id_cliente = '$idUser' AND pedidos.status = 0";
    $res = $con->query($sql);
?>