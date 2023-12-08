<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
?>

<title>Ver Detalles Promociones</title>
</head>
<body>
    <?php include('../navbar.php'); ?>
    
    <h1 class="mt-3">Ver Detalles</h1>
    <hr>
    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nueva_pomocion' href='lista_promociones.php'>Regresar al listado</a>
    </div>
    
    <?php
    require "../../funciones/conecta.php";
    $con = conecta();
    $id = $_GET['id'];
    $sql = "SELECT * FROM promociones
            WHERE eliminado = 0 AND id = $id";
    $res = $con->query($sql);
    $producto = $res->fetch_array();

    $id = $producto["id"];
    $nombre = $producto["nombre"];

    $foto = $producto["archivo"];
    $status = $producto["status"];
    if($status == 1) $status = "Activo";
    else $status = "Inactivo";


    echo "
    <div class='detalles-card mb-3'>
        <div class='card shadow' '>
            <img src='../../archivos/promociones/$foto' class='card-img-top img-profile mt-1'>
            <hr class='m-1'>
            <div class='card-body pb-1'>
                <h5 class='card-title'>$nombre</h5>
                <div class='div-text'>
                    <p class='card-text'><i class='fa-solid fa-circle'></i> $status</p>
                    <p class='card-text id-text me-5'>ID. $id</p>
                </div>
            </div>
        </div>
    </div>";
    ?>

</body>
</html>