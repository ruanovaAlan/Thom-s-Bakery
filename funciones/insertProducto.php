<?php
    session_start();
    require "conecta.php";
    $con = conecta();

    $idUser = $_SESSION['idUser'];
    $id_producto = $_REQUEST['id_producto'];
    $cantidad = $_REQUEST['cantidad'];

    $sql = "SELECT * FROM pedidos WHERE  id_cliente = '$idUser' AND status = 0";
    $res = $con->query($sql);
    $num = $res->num_rows; //0 o 1

    if($num == 0){
        $fecha = date("Y-m-d H:i:s");
        $sql = "INSERT INTO pedidos (fecha, id_cliente) VALUES ('$fecha', '$idUser')";
        $res = $con->query($sql);
        $id_pedido = $con->insert_id;
    }else{
        $row = $res->fetch_array();
        $id_pedido = $row['id'];
    }

    $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
    $res = $con->query($sql);
    $row = $res->fetch_array();
    $costo = $row['costo'];

    $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = '$id_pedido' AND id_producto = '$id_producto'";
    $res = $con->query($sql);
    $num = $res->num_rows;

    if($num > 0){
        
        $sql = "UPDATE pedidos_productos SET cantidad = cantidad + '$cantidad' WHERE id_pedido = '$id_pedido' AND id_producto = '$id_producto'";
    }else{
        
        $sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) VALUES ('$id_pedido', '$id_producto', '$cantidad', '$costo')";
    }

    $res = $con->query($sql); 

?>