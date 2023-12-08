<?php 
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
    
?>
    <link rel="stylesheet" href="../../public/lista_pedidos.css">
    <title>Lista de Pedidos</title>
</head>
<body>
    <?php include('../navbar.php'); ?>


    <div class="container">
        <h1 class="mt-3">Listado de Pedidos</h1>    
    </div>
    <hr class="mb-5">

    <div class="table-headers">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-dark mb-0 id">ID</li>
            <li class="list-group-item list-group-item-dark mb-0 fecha">Fecha</li>
            <li class="list-group-item list-group-item-dark mb-0 cliente">ID Cliente</li>
            <li class="list-group-item list-group-item-dark mb-0 ">Ver Detalles</li>
        </ul>
    </div>

    <?php
        require "../../funciones/conecta.php";
        $con = conecta();
        
        $sql = "SELECT * FROM pedidos
                WHERE status = 1 ORDER BY fecha DESC";
        $res = $con->query($sql);

        while($row = $res->fetch_array()){
            $id = $row["id"];
            $fecha = $row["fecha"];
            $id_cliente = $row["id_cliente"];
            
            echo "
            <div class='fila' id='$id'>
                <ul class='list-group list-group-horizontal '>
                    <li class='list-group-item list-group-item-secondary ms-0 id'>$id</li>
                    <li class='list-group-item fecha'>$fecha</li>
                    <li class='list-group-item cliente'>$id_cliente</li>
                </ul>
                <div class='inline-block'>
                    <a class='btn btn-secondary ms-2'  href='ver_detalles_pedidos.php?id=$id'>Ver Detalles</a>
                </div>
            </div>";
        }   
    ?>

</body>
</html>