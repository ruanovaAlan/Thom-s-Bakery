<?php 
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
?>

    <script src="../../funciones/validar_editar_productos.js"></script>
    <link rel="stylesheet" href="../../public/editar_productos.css">
    <title>Editar Productos</title>
</head>
<body>
    <?php include('../navbar.php'); ?>

    <h1 class="mt-3">Editar Productos</h1>
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
    $productos = $res->fetch_array();

    $id = $productos["id"];
    $nombre = $productos["nombre"];
    $codigo = $productos["codigo"];
    $descripcion = $productos["descripcion"];
    $costo = $productos["costo"];
    $stock = $productos["stock"];
    $archivo = $productos["archivo"];
    $archivo_n = $productos["archivo_n"];

?>

    <div class="container alta-form mb-5">
        <form name="forma02" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  name="nombre" class="form-control shadow" id="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <div class="codigo-div">
                    <input onblur="verifyCode(<?php echo $id; ?>);"  type="text" name="codigo" class="form-control shadow" id="codigo" value="<?php echo $codigo; ?>" required>
                    <div id="code-message" class="alert alert-danger" role="alert"></div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripción</label>
                <textarea class="form-control shadow" id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </div>
            <div class="mb-3 costo-stock">
                <div class=" costo">
                    <label for="costo" class="form-label">Costo</label>
                    <input type="text" class="form-control shadow" name="costo" id="costo" value="<?php echo $costo; ?>" required>
                </div>
                <div class="stock">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control shadow" name="stock" id="stock" min="1" value="<?php echo $stock; ?>" required>
                </div> 
            </div>
            <div class="mb-3">
                <img src="../../archivos/productos/<?php echo $archivo; ?>" class="img-thumbnail shadow editar-img">
                <label for="archivo" class="form-label ms-5">Foto: <?php echo $archivo_n; ?> </label>
                <input type="file" class="form-control shadow mt-3" id="archivo" name="archivo">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-success mb-2 shadow edit-btn" onclick="recibe(); return false;">Guardar</button>
            <div class="alert alert-danger" id='mensaje'  role="alert"></div>
        </form>
        
    </div>
</body>
</html>