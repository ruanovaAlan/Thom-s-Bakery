<?php

    session_start();
    $idUser = $_SESSION['idUser'];
    require "conecta.php";
    $con = conecta();

    $id_producto = $_POST["id_producto"];
    $cantidad = $_POST["cantidad"];

    $sql = "SELECT id FROM pedidos WHERE id_cliente = $idUser AND status = 0";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();
    $id_pedido = $row["id"];

    $sql = "UPDATE pedidos_productos SET cantidad = $cantidad WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
    $res = $con->query($sql);


?>