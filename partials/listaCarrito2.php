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


<h6 class="mb-3">Pedido 2/2</h6>

<table class="table  table-striped-columns">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="producto">Producto</th>
            <th scope="col" class="cantidad">Cantidad</th>
            <th scope="col" class="costo-unitario">Costo Unitario</th>
            <th scope="col" class="subtotal">Subtotal</th>
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
                $id_cliente = $row["id_cliente"];

                echo "
                <tr id='$id_producto'>
                    <td class='producto'>$nombre</td>
                    <td class='cantidad'>$cantidad</td>
                    <td class='costo-unitario'>$precio</td>
                    <td class='subtotal'>$subtotal</td>
                </tr>";
            }   
            echo "
            <tr>
                <td colspan='3' class='text-end'><strong id='total'>Total:</strong></td>
                <td class='subtotal'><strong>$total</strong></td>
            </tr>";
        ?>
    </tbody>
</table>  
<button class="btn btn-secondary" onclick="cerrarPedido(<?php echo $id_cliente ?>);">Enviar Pedido</button>  
</body>
</html>