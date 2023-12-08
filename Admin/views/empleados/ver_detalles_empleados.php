<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }
    
    include('../../partials/head.php');
?>
    
    <title>Ver Detalles Empleados</title>
</head>
<body>
    <?php include('../navbar.php'); ?>
    <h1 class="mt-3">Ver Detalles</h1>
    <hr>
    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nuevo_empleado' href='lista_empleados.php'>Regresar al listado</a>
    </div>
    
    <?php
    require "../../funciones/conecta.php";
    $con = conecta();
    $id = $_GET['id'];
    $sql = "SELECT * FROM empleados
            WHERE eliminado = 0 AND id = $id";
    $res = $con->query($sql);
    $empleado = $res->fetch_array();

    $id = $empleado["id"];
    $nombre = $empleado["nombre"];
    $apellidos = $empleado["apellidos"];
    $correo = $empleado["correo"];

    $foto = $empleado["archivo"];
    if($foto == "") $foto = "usuario.png";
    
    $rol = $empleado["rol"];
    if($rol == 1) $rol = 'Gerente';
    else $rol = 'Ejecutivo';

    $status = $empleado["status"];
    if($status == 1) $status = "Activo";
    else $status = "Inactivo";


    echo "
    <div class='detalles-card mb-3'>
        <div class='card shadow' style='width: 20rem;'>
            <img src='../../archivos/empleados/$foto' class='card-img-top img-profile mt-1'>
            <hr class='m-1'>
            <div class='card-body pb-1'>
                <h5 class='card-title'>$nombre $apellidos</h5>
                <div class='div-text'>
                    <p class='card-text'>$rol</p>
                    <p class='card-text id-text me-5'>ID. $id</p>
                </div>
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item mb-0'><i class='fa-solid fa-envelope'></i> $correo</li>
                <li class='list-group-item mb-0'><i class='fa-solid fa-circle'></i> $status</li>
            </ul>
        </div>
    </div>";
    ?>

</body>
</html>