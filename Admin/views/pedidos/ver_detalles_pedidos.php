<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    $id_pedido = $_GET["id"]; 

    include('../../partials/head.php');
?>

<title>Ver Detalles Pedidos</title>
<link rel="stylesheet" href="../../public/lista_pedidos.css">
</head>
<body>
    <?php include('../navbar.php'); ?>

    <h1 class="mt-3">Ver Detalles Pedido ID: <?php echo $id_pedido ?></h1>
    <hr>
    <div class='mx-3 mb-3'>
        <a class='btn btn-primary shadow nueva_pomocion' href='lista_pedidos.php'>Regresar al listado</a>
    </div>

    <div class="container-fluid">
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
                    require "../../funciones/conecta.php";
                    $con = conecta();
                    $sql = "SELECT * FROM pedidos_productos
                            INNER JOIN productos ON pedidos_productos.id_producto = productos.id
                            INNER JOIN pedidos ON pedidos_productos.id_pedido = pedidos.id
                            WHERE id_pedido = '$id_pedido' AND pedidos.status = 1";
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
    </div>
</body>
</html>