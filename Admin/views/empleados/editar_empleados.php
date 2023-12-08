<?php 
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }

    include('../../partials/head.php');
?>

    <script src="../../funciones/empleados/validar_editar_empleados.js"></script>
    <title>Editar Empleados</title>
</head>
<body>
    <?php include('../navbar.php'); ?>

    <h1 class="mt-3">Editar Empleados</h1>
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
    $pass = $empleado["pass"];
    $rol = $empleado["rol"];
    $archivo = $empleado["archivo"];
    $archivo_n = $empleado["archivo_n"];

?>

    <div class="container alta-form mb-5">
        <form name="forma01" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  name="nombre" class="form-control shadow" id="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text"  name="apellidos" class="form-control shadow" id="apellidos" value="<?php echo $apellidos; ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Email</label>
                <div class="email-div">
                    <input onblur="verifyEmail(<?php echo $id; ?>);"  type="email" name="correo" class="form-control shadow" id="correo" value="<?php echo $correo; ?>" required>
                    <div id="email-message" class="alert alert-danger" role="alert"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control shadow" name="pass" id="pass">
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select mb-3 shadow" name="rol" id="rol" value="<?php echo $rol; ?>" required>
                    <option value="0">Selecciona...</option>
                    <option value="1" <?php echo ($rol == 1) ? 'selected' : ''; ?>>Gerente</option>
                    <option value="2" <?php echo ($rol == 2) ? 'selected' : ''; ?>>Ejecutivo</option>
                </select>
            </div>
            <div class="mb-3">
                <img src="../../archivos/empleados/<?php echo $archivo; ?>" class="img-thumbnail editar-img">
                <label for="rol" class="form-label ms-5">Foto: <?php echo $archivo_n; ?> </label>
                <input type="file" class="form-control shadow mt-3" id="archivo" name="archivo">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-success mb-2 shadow" onclick="recibe(); return false;">Guardar</button>
            <div class="alert alert-danger" id='mensaje'  role="alert"></div>
        </form>
        
    </div>
</body>
</html>