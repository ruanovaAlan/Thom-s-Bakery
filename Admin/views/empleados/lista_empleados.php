<?php 
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
?>

    <script src="../../funciones/empleados/validar_eliminar_empleados.js"></script>
    <title>Lista de Empleados</title>
</head>
<body>
    <?php include('../navbar.php'); ?>

    <div class="container">
        <h1 class="mt-3">Listado de Empleados</h1>    
    </div>
    <hr>

    <div class="alert" id='mensaje' role="alert"></div>
    
    <div id='nuevo' class='mx-5 mb-2'>
        <a class='btn btn-primary nuevo_empleado shadow' href='alta_empleados.php'>Nuevo</a>
    </div>

    <div class="table-headers">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-dark mb-0 id">ID</li>
            <li class="list-group-item list-group-item-dark mb-0 correo">Correo</li>
            <li class="list-group-item list-group-item-dark mb-0 nombre">Nombre Completo</li>
            <li class="list-group-item list-group-item-dark mb-0 rol">Rol</li>
            <li class="list-group-item list-group-item-dark mb-0 ">Eliminar</li>
            <li class="list-group-item list-group-item-dark mb-0 ">Ver Detalles</li>
            <li class="list-group-item list-group-item-dark mb-0 me-2">Editar</li>
        </ul>
    </div>

    <?php
        require "../../funciones/conecta.php";
        $con = conecta();
        
        $sql = "SELECT * FROM empleados
                WHERE status = 1 AND eliminado = 0";
        $res = $con->query($sql);

        while($row = $res->fetch_array()){
            $id = $row["id"];
            $nombre = $row["nombre"];
            $apellidos = $row["apellidos"];
            $correo = $row["correo"];
            
            $rol = $row["rol"];
            if($rol == 1) $rol = 'Gerente';
            else $rol = 'Ejecutivo';

            echo "
            <div class='fila' id='$id'>
                <ul class='list-group list-group-horizontal'>
                    <li class='list-group-item list-group-item-secondary id'>$id</li>
                    <li class='list-group-item nombre'>$nombre $apellidos</li>
                    <li class='list-group-item correo'>$correo</li>
                    <li class='list-group-item rol'>$rol</li>
                </ul>
                <div class='inline-block'>
                    <a class='btn btn-danger ms-2'  onclick='handleDelete($id)'>Eliminar</a>
                    <a class='btn btn-secondary ms-2'  href='ver_detalles_empleados.php?id=$id'>Ver Detalles</a>
                    <a class='btn btn-secondary mx-2'  href='editar_empleados.php?id=$id'>Editar</a>
                </div>
            </div>";
        }   
    ?>

</body>
</html>