<?php
    session_start();

    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
    }else{
        $idUser = 0;
    }

    include "../funciones/conecta.php";
    $con = conecta();
?>

<script src="funciones/carrito2.js"></script>
<script src="funciones/modificarCantidadCarrito.js"></script>
<h6 class="mb-3">Pedido 1/2</h6>

<table class="table  table-striped-columns">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="producto">Producto</th>
            <th scope="col" class="cantidad">Cantidad</th>
            <th scope="col" class="costo-unitario">Costo Unitario</th>
            <th scope="col" class="subtotal">Subtotal</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php       
            $sql = "SELECT * FROM pedidos_productos
                    INNER JOIN productos ON pedidos_productos.id_producto = productos.id
                    INNER JOIN pedidos ON pedidos_productos.id_pedido = pedidos.id
                    WHERE id_cliente = '$idUser' AND pedidos.status = 0";
            $res = $con->query($sql);

            $total = 0;

            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                $precio = $row["precio"];
                $cantidad = $row["cantidad"];
                $subtotal = $precio * $cantidad;
                $id_producto = $row["id_producto"];
                
                $total += $subtotal;

                echo "
                <tr id='$id_producto' class='producto' data-id='$id_producto'>
                    <td class='nombre'>$nombre</td>
                    <td class='cantidad'><input type='number' min='1' value='$cantidad' class='cantidad-input' data-id='$id_producto'></td>
                    <td class='costo-unitario' data-precio='$precio'>$precio</td>
                    <td class='subtotal' data-subtotal='$subtotal'>$subtotal</td>
                    <td>
                        <a class='btn btn-sm btn-danger eliminar-producto'  onclick='eliminarProducto($id_producto, $subtotal)'>Eliminar</a>
                    </td>
                </tr>";
            }   

            echo "
            <tr class='total-producto'>
                <td colspan='3' class='text-end'><strong>Total:</strong></td>
                <td class='subtotal'><strong id='total'>$total</strong></td>
            </tr>";
        ?>
    </tbody>
</table>   
<button id="continue-button" class="btn btn-secondary">Continuar</button>

</body>
</html>



