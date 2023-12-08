<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }
    
    include('../../partials/head.php');
?>

    <script src="../../funciones/empleados/validar_alta_empleados.js"></script>
    <title>Alta de Empleados</title>    
</head>
<body>
    <?php include('../navbar.php'); ?>
    <h1 class="mt-3">Alta de Empleados</h1>
    <hr>

    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nuevo_empleado' href='lista_empleados.php'>Regresar al listado</a>
    </div>
    <div class="container alta-form mb-5">


        <form name="forma01" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  name="nombre" class="form-control shadow" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text"  name="apellidos" class="form-control shadow" id="apellidos" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Email</label>
                <div class="email-div">
                    <input onblur="verifyEmail();"  type="email" name="correo" class="form-control shadow" id="correo" required>
                    <div id="email-message" class="alert alert-danger" role="alert"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control shadow" name="pass" id="pass" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select mb-3 shadow" name="rol" required>
                    <option selected>Selecciona...</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Foto</label>
                <input type="file" class="form-control shadow" id="archivo" name="archivo" required>
            </div>
            <button type="submit" class="btn btn-success mb-2 shadow" onclick="recibe(); return false;">Guardar</button>
            <div class="alert alert-danger" id='mensaje'  role="alert"></div>
        </form>
        
    </div>
</body>
</html>