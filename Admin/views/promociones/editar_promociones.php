<?php 
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
?>

    <script src="../../funciones/validar_editar_promociones.js"></script>
    <link rel="stylesheet" href="../../public/editar_promociones.css">
    <title>Editar Productos</title>
</head>
<body>
    <?php include('../navbar.php'); ?>

    <h1 class="mt-3">Editar Promociones</h1>
    <hr>

    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nuevo_empleado' href='lista_promociones.php'>Regresar al listado</a>
    </div>

    <?php
    require "../../funciones/conecta.php";
    $con = conecta();
    $id = $_GET['id'];
    $sql = "SELECT * FROM promociones
            WHERE eliminado = 0 AND id = $id";
    $res = $con->query($sql);
    $promociones = $res->fetch_array();

    $id = $promociones["id"];
    $nombre = $promociones["nombre"];
    $archivo = $promociones["archivo"];


?>

    <div class="container alta-form mb-5">
        <form name="forma02" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  name="nombre" class="form-control shadow" id="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Foto</label>
                <div>
                    <img src="../../archivos/promociones/<?php echo $archivo; ?>" class="img-thumbnail shadow editar-img">
                    <input type="file" class="form-control shadow mt-3" id="archivo" name="archivo">
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-success mb-2 shadow edit-btn" onclick="recibe(); return false;">Guardar</button>
            <div class="alert alert-danger" id='mensaje'  role="alert"></div>
        </form>
    </div>
</body>
</html>