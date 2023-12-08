<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
?>

<title>Ver Detalles Productos</title>
</head>
<body>
    <?php include('../navbar.php'); ?>
    
    <h1 class="mt-3">Ver Detalles</h1>
    <hr>
    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nuevo_empleado' href='lista_productos.php'>Regresar al listado</a>
    </div>
    
    <?php
    require "../../funciones/conecta.php";
    $con = conecta();
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos
            WHERE eliminado = 0 AND id = $id";
    $res = $con->query($sql);
    $producto = $res->fetch_array();

    $id = $producto["id"];
    $nombre = $producto["nombre"];
    $codigo = $producto["codigo"];
    $descripcion = $producto["descripcion"];
    $costo = $producto["costo"];
    $stock = $producto["stock"];

    $foto = $producto["archivo"];
    $status = $producto["status"];
    if($status == 1) $status = "Activo";
    else $status = "Inactivo";


    echo "
    <div class='detalles-card mb-3'>
        <div class='card shadow' style='width: 20rem;'>
            <img src='../../archivos/productos/$foto' class='card-img-top img-profile mt-1'>
            <hr class='m-1'>
            <div class='card-body pb-1'>
                <h5 class='card-title'>$nombre</h5>
                <div class='div-text'>
                    <p class='card-text'><i class='fa-solid fa-barcode'></i> $codigo</p>
                    <p class='card-text id-text me-5'>ID. $id</p>
                </div>
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item mb-0 d-flex justify-content-between'>
                    <div><i class='fa-solid fa-dollar-sign'></i> $costo</div>
                    <div class='me-5'><i class='fa-solid fa-boxes-stacked'></i> $stock</div>
                </li>
                <li class='list-group-item mb-0'><i class='fa-solid fa-newspaper'></i> $descripcion</li>
                <li class='list-group-item mb-0'><i class='fa-solid fa-circle'></i> $status</li>
            </ul>
        </div>
    </div>";
    ?>

</body>
</html>