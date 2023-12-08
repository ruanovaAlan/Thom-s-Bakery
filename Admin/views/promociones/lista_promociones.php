<?php 
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
    
?>
    <link rel="stylesheet" href="../../public/lista_promociones.css">
    <script src="../../funciones/validar_eliminar_promociones.js"></script>
    <title>Lista de Promociones</title>
</head>
<body>
    <?php include('../navbar.php'); ?>


    <div class="container">
        <h1 class="mt-3">Listado de Promociones</h1>    
    </div>
    <hr class="mb-0">

    <div class="alert" id='mensaje' role="alert"></div>
    
    <div id='nuevo' class='mx-5 mb-2'>
        <a class='btn btn-primary nuevo_empleado shadow my-3' href='alta_promociones.php'>Nuevo</a>
    </div>

    <div class="table-headers">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-dark mb-0 id">ID</li>
            <li class="list-group-item list-group-item-dark mb-0 nombre">Nombre</li>
            <li class="list-group-item list-group-item-dark mb-0 status">Status</li>
            <li class="list-group-item list-group-item-dark mb-0 ">Eliminar</li>
            <li class="list-group-item list-group-item-dark mb-0 ">Ver Detalles</li>
            <li class="list-group-item list-group-item-dark mb-0 me-2">Editar</li>
        </ul>
    </div>

    <?php
        require "../../funciones/conecta.php";
        $con = conecta();
        
        $sql = "SELECT * FROM promociones
                WHERE status = 1 AND eliminado = 0 
                ORDER BY id ASC";
        $res = $con->query($sql);

        while($row = $res->fetch_array()){
            $id = $row["id"];
            $nombre = $row["nombre"];
            $status = $row["status"] == 1 ? "Activo" : "Inactivo";
            
            echo "
            <div class='fila' id='$id'>
                <ul class='list-group list-group-horizontal me-0'>
                    <li class='list-group-item list-group-item-secondary id'>$id</li>
                    <li class='list-group-item nombre'>$nombre</li>
                    <li class='list-group-item status'>$status</li>
                </ul>
                <div class='inline-block'>
                    <a class='btn btn-danger ms-2'  onclick='handleDelete($id)'>Eliminar</a>
                    <a class='btn btn-secondary ms-2'  href='ver_detalles_promociones.php?id=$id'>Ver Detalles</a>
                    <a class='btn btn-secondary mx-2'  href='editar_promociones.php?id=$id'>Editar</a>
                </div>
            </div>";
        }   
    ?>

</body>
</html>